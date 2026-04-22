<?php

namespace App\Filament\Member\Resources\Borrowings\Pages;

use App\Filament\Member\Resources\Borrowings\BorrowingResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBorrowing extends CreateRecord
{
    protected static string $resource = BorrowingResource::class;
}
