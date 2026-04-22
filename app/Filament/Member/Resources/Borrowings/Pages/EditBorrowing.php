<?php

namespace App\Filament\Member\Resources\Borrowings\Pages;

use App\Filament\Member\Resources\Borrowings\BorrowingResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBorrowing extends EditRecord
{
    protected static string $resource = BorrowingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
