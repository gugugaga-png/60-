<div class="space-y-6">
    {{-- Search & Filter --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div class="relative w-full sm:max-w-md">
            <x-filament::input.wrapper class="w-full">
                <x-filament::input
                    type="search"
                    placeholder="Cari item..."
                    wire:model.live.debounce.300ms="search"
                />
            </x-filament::input.wrapper>
        </div>

        <div class="flex items-center gap-3">
            <x-filament::input.wrapper class="w-48">
                <x-filament::input.select wire:model.live="categoryFilter">
                    <option value="">Semua Kategori</option>
                    @foreach($this->getCategories() as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </x-filament::input.select>
            </x-filament::input.wrapper>

            <x-filament::input.wrapper class="w-48">
                <x-filament::input.select wire:model.live="sort">
                    <option value="newest">Terbaru</option>
                    <option value="oldest">Terlama</option>
                    <option value="price_low">Harga Terendah</option>
                    <option value="price_high">Harga Tertinggi</option>
                    <option value="name_asc">Nama A-Z</option>
                    <option value="name_desc">Nama Z-A</option>
                </x-filament::input.select>
            </x-filament::input.wrapper>
        </div>
    </div>

    {{-- Stats & Layout Toggle --}}
    <div class="flex items-center justify-between border-b border-gray-200 pb-4 dark:border-gray-700">
        <p class="text-sm text-gray-600 dark:text-gray-400">
            Menampilkan
            <span class="font-medium text-gray-900 dark:text-white">{{ $this->getItems()->total() }}</span>
            item
        </p>
        <div class="flex items-center gap-2">
            <x-filament::icon-button
                icon="heroicon-m-squares-2x2"
                color="gray"
                size="sm"
                wire:click="$set('viewLayout', 'grid')"
            />
            <x-filament::icon-button
                icon="heroicon-m-list-bullet"
                color="gray"
                size="sm"
                wire:click="$set('viewLayout', 'list')"
            />
        </div>
    </div>

    {{-- Grid View --}}
    @if($viewLayout === 'grid')
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @forelse ($this->getItems() as $item)
                <div class="group relative flex flex-col overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-gray-200 transition-all duration-300 hover:shadow-lg dark:bg-gray-800 dark:ring-gray-700">

                    {{-- Badge Stok --}}
                    @if($item->stock <= 0)
                        <div class="absolute left-3 top-3 z-10">
                            <span class="inline-flex items-center rounded-full bg-red-50 px-2.5 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10">Stok Habis</span>
                        </div>
                    @elseif($item->stock <= 5)
                        <div class="absolute left-3 top-3 z-10">
                            <span class="inline-flex items-center rounded-full bg-yellow-50 px-2.5 py-1 text-xs font-medium text-yellow-700 ring-1 ring-inset ring-yellow-600/10">Stok Terbatas</span>
                        </div>
                    @endif

                    {{-- Gambar --}}
                    <div class="relative aspect-square w-full overflow-hidden bg-gray-100 dark:bg-gray-700">
                        @if ($item->image)
                            <img src="{{ Storage::url($item->image) }}" alt="{{ $item->name }}"
                                class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-105" loading="lazy" />
                        @else
                            <div class="flex h-full w-full items-center justify-center">
                                <x-filament::icon icon="heroicon-o-photo" class="h-16 w-16 text-gray-400" />
                            </div>
                        @endif
                    </div>

                    {{-- Konten --}}
                    <div class="flex flex-1 flex-col p-5">
                        @if($item->category)
                            <div class="mb-2">
                                <span class="inline-flex items-center rounded-full bg-primary-50 px-2.5 py-0.5 text-xs font-medium text-primary-700 dark:bg-primary-400/10 dark:text-primary-400">
                                    {{ $item->category->name }}
                                </span>
                            </div>
                        @endif

                        <h3 class="mb-2 line-clamp-2 text-base font-semibold text-gray-900 dark:text-white">
                            {{ $item->name }}
                        </h3>

                        <p class="mb-4 line-clamp-2 text-sm text-gray-600 dark:text-gray-400">
                            {{ $item->description ?? 'Tidak ada deskripsi' }}
                        </p>

                        <div class="flex-1"></div>

                        <div class="mb-4 flex items-end justify-between">
                            <div>
                                <p class="text-xs text-gray-500">Harga</p>
                                <p class="text-xl font-bold text-gray-900 dark:text-white">
                                    Rp {{ number_format($item->price, 0, ',', '.') }}
                                </p>
                            </div>
                            <div class="text-right">
                                <p class="text-xs text-gray-500">Stok</p>
                                <p class="text-sm font-medium {{ $item->stock <= 0 ? 'text-red-600' : ($item->stock <= 5 ? 'text-yellow-600' : 'text-green-600') }}">
                                    {{ $item->stock }} tersedia
                                </p>
                            </div>
                        </div>

                        <x-filament::button
                            :href="$item->stock > 0 ? \App\Filament\Member\Resources\Borrowings\BorrowingResource::getUrl('create', ['item_id' => $item->id]) : null"
                            color="{{ $item->stock <= 0 ? 'gray' : 'primary' }}"
                            size="sm"
                            class="w-full"
                            :disabled="$item->stock <= 0"
                        >
                            {{ $item->stock <= 0 ? 'Stok Habis' : 'Pinjam' }}
                        </x-filament::button>
                    </div>
                </div>
            @empty
                <div class="col-span-full flex flex-col items-center justify-center rounded-xl border-2 border-dashed border-gray-300 py-16">
                    <x-filament::icon icon="heroicon-o-rectangle-stack" class="h-12 w-12 text-gray-400" />
                    <h3 class="mt-4 text-lg font-semibold text-gray-900 dark:text-white">Tidak ada item</h3>
                    <p class="mt-2 text-gray-500">Belum ada item yang tersedia.</p>
                </div>
            @endforelse
        </div>
    @endif

    {{-- List View --}}
    @if($viewLayout === 'list')
        <div class="space-y-4">
            @forelse ($this->getItems() as $item)
                <div class="group flex flex-col gap-4 rounded-xl bg-white p-4 shadow-sm ring-1 ring-gray-200 transition-all hover:shadow-md sm:flex-row dark:bg-gray-800 dark:ring-gray-700">
                    <div class="relative h-40 w-full flex-shrink-0 overflow-hidden rounded-lg bg-gray-100 sm:h-32 sm:w-48 dark:bg-gray-700">
                        @if ($item->image)
                            <img src="{{ Storage::url($item->image) }}" alt="{{ $item->name }}"
                                class="h-full w-full object-cover" loading="lazy" />
                        @else
                            <div class="flex h-full w-full items-center justify-center">
                                <x-filament::icon icon="heroicon-o-photo" class="h-10 w-10 text-gray-400" />
                            </div>
                        @endif
                    </div>

                    <div class="flex flex-1 flex-col justify-between gap-4 sm:flex-row sm:items-center">
                        <div class="flex-1 space-y-2">
                            <div class="flex flex-wrap items-start gap-2">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $item->name }}</h3>
                                @if($item->category)
                                    <span class="inline-flex items-center rounded-full bg-primary-50 px-2.5 py-0.5 text-xs font-medium text-primary-700 dark:bg-primary-400/10 dark:text-primary-400">
                                        {{ $item->category->name }}
                                    </span>
                                @endif
                            </div>
                            <p class="line-clamp-2 text-sm text-gray-600 dark:text-gray-400">
                                {{ $item->description ?? 'Tidak ada deskripsi' }}
                            </p>
                            <div class="flex items-center gap-6">
                                <div>
                                    <span class="text-xs text-gray-500">Harga</span>
                                    <p class="text-lg font-bold text-gray-900 dark:text-white">
                                        Rp {{ number_format($item->price, 0, ',', '.') }}
                                    </p>
                                </div>
                                <div>
                                    <span class="text-xs text-gray-500">Stok</span>
                                    <p class="font-medium {{ $item->stock <= 0 ? 'text-red-600' : ($item->stock <= 5 ? 'text-yellow-600' : 'text-green-600') }}">
                                        {{ $item->stock }} tersedia
                                    </p>
                                </div>
                            </div>
                        </div>

                        <x-filament::button
                            :href="$item->stock > 0 ? \App\Filament\Member\Resources\Borrowings\BorrowingResource::getUrl('create', ['item_id' => $item->id]) : null"
                            color="{{ $item->stock <= 0 ? 'gray' : 'primary' }}"
                            size="sm"
                            :disabled="$item->stock <= 0"
                        >
                            {{ $item->stock <= 0 ? 'Stok Habis' : 'Pinjam' }}
                        </x-filament::button>
                    </div>
                </div>
            @empty
                <div class="flex flex-col items-center justify-center rounded-xl border-2 border-dashed border-gray-300 py-16">
                    <x-filament::icon icon="heroicon-o-rectangle-stack" class="h-12 w-12 text-gray-400" />
                    <h3 class="mt-4 text-lg font-semibold text-gray-900 dark:text-white">Tidak ada item</h3>
                </div>
            @endforelse
        </div>
    @endif

    {{-- Pagination --}}
    @if($this->getItems()->hasPages())
        <div class="mt-8 border-t border-gray-200 pt-6 dark:border-gray-700">
            {{ $this->getItems()->links() }}
        </div>
    @endif
</div>