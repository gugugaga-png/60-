<?php

namespace App\Filament\Resources\Categories\Pages;

use App\Filament\Resources\Categories\CategoryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCategory extends EditRecord
{
    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->disabled(fn ($record) => $record->items()->exists())
                ->tooltip(fn ($record) =>
                    $record->items()->exists()
                        ? 'Category masih digunakan oleh item'
                        : 'Hapus category'
                )
                ->before(function ($record) {
                    if ($record->items()->exists()) {
                        throw new \Exception('Category tidak bisa dihapus karena masih digunakan oleh item.');
                    }
                }),
        ];
    }
}
