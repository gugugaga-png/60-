<x-filament::page>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">

        @foreach ($this->items as $item)
            <div class="bg-white rounded-xl border p-4 hover:shadow transition">
                
                <img src="{{ asset('storage/' . $item->image) }}"
                     class="w-full h-40 object-cover rounded-lg mb-3">

                <h3 class="font-semibold text-lg">
                    {{ $item->name }}
                </h3>

                <p class="text-sm mb-2">
                    Status:
                    <span class="{{ $item->is_available ? 'text-green-500' : 'text-red-500' }}">
                        {{ $item->is_available ? 'Tersedia' : 'Dipinjam' }}
                    </span>
                </p>

                <button
                    wire:click="borrow({{ $item->id }})"
                    class="w-full bg-blue-500 text-white py-2 rounded-lg disabled:bg-gray-300"
                    {{ !$item->is_available ? 'disabled' : '' }}
                >
                    Pinjam
                </button>

            </div>
        @endforeach

    </div>
</x-filament::page>