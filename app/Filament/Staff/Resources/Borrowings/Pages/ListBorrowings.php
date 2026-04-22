<?php

namespace App\Filament\Staff\Resources\Borrowings\Pages;

use App\Filament\Staff\Resources\Borrowings\BorrowingResource;
use App\Filament\Resources\Borrowings\Tables\BorrowingsTable;
use App\Models\Borrowing;
use App\Models\ItemReturn;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\CreateAction;
use Filament\Notifications\Notification;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Placeholder;
use Illuminate\Support\Carbon;

class ListBorrowings extends ListRecords
{
    protected static string $resource = BorrowingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->visible(fn () => auth()->user()?->role === 'admin'),
        ];
    }

    public function table(Table $table): Table
    {
        $table = BorrowingsTable::configure($table);

        return $table
            ->actions([
                // Tombol Approve
                Action::make('approve')
                    ->label('Approve')
                    ->color('success')
                    ->icon('heroicon-o-check')
                    ->requiresConfirmation()
                    ->visible(fn ($record) => $record->status === 'pending')
                    ->action(function (Borrowing $record) {
                        $item = $record->item;

                        if ($item->available_stock >= $record->quantity) {
                            $record->update(['status' => 'approved']);
                            $item->decrement('available_stock', $record->quantity);

                            Notification::make()
                                ->title('Approved!')
                                ->body("Stock remaining: {$item->fresh()->available_stock}")
                                ->success()
                                ->send();
                        } else {
                            Notification::make()
                                ->title('Stock tidak cukup!')
                                ->danger()
                                ->send();
                        }
                    }),

                // Tombol Reject
                Action::make('reject')
                    ->label('Reject')
                    ->color('danger')
                    ->icon('heroicon-o-x-mark')
                    ->requiresConfirmation()
                    ->visible(fn ($record) => $record->status === 'pending')
                    ->action(function (Borrowing $record) {
                        $record->update(['status' => 'rejected']);

                        Notification::make()
                            ->title('Rejected!')
                            ->warning()
                            ->send();
                    }),

                // Tombol Return dengan informasi lengkap
            
                // Tombol Edit - Hanya Admin dan status belum returned
                EditAction::make()
                    ->visible(fn ($record) =>
                        auth()->user()?->role === 'admin' && $record->status !== 'returned'
                    ),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->visible(fn () => auth()->user()?->role === 'admin'),
                ]),
            ]);
    }

    private function calculateFine(Borrowing $record, $returnDate): int
    {
        $estimatedReturn = Carbon::parse($record->estimated_return_date);
        $returnDate = Carbon::parse($returnDate);

        if ($returnDate->lte($estimatedReturn)) {
            return 0;
        }

        $daysLate = $returnDate->diffInDays($estimatedReturn);
        $finePerDay = 5000;

        return $daysLate * $finePerDay;
    }

    private function formatFineDisplay(int $fine): string
    {
        if ($fine <= 0) {
            return 'Rp 0 (No fine)';
        }

        return 'Rp ' . number_format($fine, 0, ',', '.');
    }
}
