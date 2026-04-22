<?php

namespace App\Filament\Staff\Resources\ItemReturns\Pages;

use App\Filament\Staff\Resources\ItemReturns\ItemReturnResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditItemReturn extends EditRecord
{
    protected static string $resource = ItemReturnResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
