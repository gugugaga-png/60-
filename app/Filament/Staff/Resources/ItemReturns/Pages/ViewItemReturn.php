<?php

namespace App\Filament\Staff\Resources\ItemReturns\Pages;

use App\Filament\Staff\Resources\ItemReturns\ItemReturnResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewItemReturn extends ViewRecord
{
    protected static string $resource = ItemReturnResource::class;

    protected function getHeaderActions(): array
    {
        return [
           
        ];
    }
}
