<?php

namespace App\Filament\Resources\Categories\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\DeleteAction;
class CategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table

            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make()
    ->disabled(fn ($record) => $record->items()->exists())
    ->tooltip(fn ($record) =>
        $record->items()->exists()
            ? 'Category masih digunakan oleh item'
            : 'Hapus category'
    )
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->disabled(fn ($records) => $records->contains(fn ($record) => $record->items()->exists()))
                        ->tooltip(fn ($records) =>
                            $records->contains(fn ($record) => $record->items()->exists())
                                ? 'Beberapa category masih digunakan oleh item'
                                : 'Hapus category yang dipilih'
                        ),
                ]),
            ]);
    }
}
