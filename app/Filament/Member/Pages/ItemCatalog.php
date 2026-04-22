<?php

namespace App\Filament\Member\Pages;

use Filament\Pages\Page;

class ItemCatalog extends Page
{
    protected string $view = 'filament.pages.item-catalog';

    public $items;

    public function mount()
    {
        $this->items = \App\Models\Item::all();
    }
}
