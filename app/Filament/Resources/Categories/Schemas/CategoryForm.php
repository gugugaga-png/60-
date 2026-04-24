<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    /** * Memastikan nama unik di tabel 'categories'.
                     * 'ignoreRecord: true' sangat penting agar saat kita mengedit
                     * kategori, sistem tidak menolak nama yang sedang kita gunakan sendiri.
                     */
                    ->unique(table: 'categories', column: 'name', ignoreRecord: true)
                    // Opsional: Pesan error kustom dalam Bahasa Indonesia
                    ->validationMessages([
                        'unique' => 'Nama kategori ini sudah ada, gunakan nama lain.',
                    ]),
            ]);
    }
}
