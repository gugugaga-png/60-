<?php

namespace App\Filament\Staff\Resources\ItemReturns;

use App\Filament\Staff\Resources\ItemReturns\Pages\CreateItemReturn;
use App\Filament\Staff\Resources\ItemReturns\Pages\EditItemReturn;
use App\Filament\Staff\Resources\ItemReturns\Pages\ListItemReturns;
use App\Filament\Staff\Resources\ItemReturns\Pages\ViewItemReturn;
use App\Filament\Staff\Resources\ItemReturns\Schemas\ItemReturnForm;
use App\Filament\Staff\Resources\ItemReturns\Schemas\ItemReturnInfolist;
use App\Filament\Staff\Resources\ItemReturns\Tables\ItemReturnsTable;
use App\Models\ItemReturn;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
Use UnitEnum;

class ItemReturnResource extends Resource
{
    protected static ?string $model = ItemReturn::class;
     protected static string | UnitEnum | null $navigationGroup = 'Utilities';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return ItemReturnForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ItemReturnInfolist::configure($schema);
    }
    // ✅ Hilangkan tombol CREATE (tidak boleh buat manual)
    public static function canCreate(): bool
    {
        return false;
    }

    public static function canCreateAnother(): bool
    {
        return false;
    }

    public static function table(Table $table): Table
    {
        return ItemReturnsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }
     // ✅ Hanya Admin yang bisa edit
    public static function canEdit($record): bool
    {
        return auth()->user()?->isAdmin() ?? false;
    }

    // ✅ Hanya Admin yang bisa delete
    public static function canDelete($record): bool
    {
        return auth()->user()?->isAdmin() ?? false;
    }
    public static function getPages(): array
    {
        return [
            'index' => ListItemReturns::route('/'),
            'create' => CreateItemReturn::route('/create'),
            'view' => ViewItemReturn::route('/{record}'),
            'edit' => EditItemReturn::route('/{record}/edit'),
        ];
    }
}
