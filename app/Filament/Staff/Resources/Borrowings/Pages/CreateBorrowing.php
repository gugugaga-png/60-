<?php

namespace App\Filament\Staff\Resources\Borrowings\Pages;

use App\Filament\Staff\Resources\Borrowings\BorrowingResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBorrowing extends CreateRecord
{
    protected static string $resource = BorrowingResource::class;
}
