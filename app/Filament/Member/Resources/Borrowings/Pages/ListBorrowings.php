<?php

namespace App\Filament\Member\Resources\Borrowings\Pages;

use App\Filament\Member\Resources\Borrowings\BorrowingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBorrowings extends ListRecords
{
    protected static string $resource = BorrowingResource::class;

    // protected function getHeaderActions(): array
    // {
    //     // return [
    //     //     CreateAction::make(),
    //     // ];
    // }
}
