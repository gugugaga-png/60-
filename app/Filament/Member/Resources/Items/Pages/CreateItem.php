<?php

namespace App\Filament\Member\Resources\Items\Pages;

use App\Filament\Member\Resources\Items\ItemResource;
use Filament\Resources\Pages\CreateRecord;

class CreateItem extends CreateRecord
{
    protected static string $resource = ItemResource::class;
}
