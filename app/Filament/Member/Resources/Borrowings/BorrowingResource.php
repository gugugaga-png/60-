<?php

namespace App\Filament\Member\Resources\Borrowings;

use App\Filament\Member\Resources\Borrowings\Pages\CreateBorrowing;
use App\Filament\Member\Resources\Borrowings\Pages\EditBorrowing;
use App\Filament\Member\Resources\Borrowings\Pages\ListBorrowings;
use App\Filament\Member\Resources\Borrowings\Schemas\BorrowingForm;
use App\Filament\Member\Resources\Borrowings\Tables\BorrowingsTable;
use App\Models\Borrowing;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BorrowingResource extends Resource
{
    protected static ?string $model = Borrowing::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return BorrowingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BorrowingsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    public static function canEdit($record): bool
{
    return false;
}
    public static function getPages(): array
    {
        return [
            'index' => ListBorrowings::route('/'),
            'create' => CreateBorrowing::route('/create'),
            'edit' => EditBorrowing::route('/{record}/edit'),
        ];
    }
}
