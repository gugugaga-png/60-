<?php

namespace App\Filament\Staff\Resources\Borrowings\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class BorrowingInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user.name')
                    ->label('User'),
                TextEntry::make('item.name')
                    ->label('Item'),
                TextEntry::make('quantity')
                    ->numeric(),
                TextEntry::make('borrow_date')
                    ->date(),
                TextEntry::make('estimated_return_date')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('total_rental_cost')
                    ->money(),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
