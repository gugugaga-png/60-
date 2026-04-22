<?php

namespace App\Filament\Staff\Resources\ItemReturns\Pages;

use App\Filament\Staff\Resources\ItemReturns\ItemReturnResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
class ListItemReturns extends ListRecords
{
    protected static string $resource = ItemReturnResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // CreateAction::make(),
            ExportAction::make(),
        ];
    }
}
