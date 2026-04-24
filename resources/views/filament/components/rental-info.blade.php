<div class="space-y-4 text-sm">

    <!-- Rental Details -->
    <div class="p-4 rounded-xl border bg-gray-50">
        <h3 class="text-sm font-semibold text-gray-700 mb-3">
            Rental Details
        </h3>

        <div class="grid grid-cols-2 gap-y-2">
            <span class="text-gray-500">Item</span>
            <span class="font-medium">{{ $record->item->name }}</span>

            <span class="text-gray-500">Daily Price</span>
            <span>{{ $record->item->getFormattedDailyPrice() }}</span>

            <span class="text-gray-500">Quantity</span>
            <span>{{ $record->quantity }}</span>

            <span class="text-gray-500">Rental Days</span>
            <span>{{ $days }} days</span>

            <span class="text-gray-500">Total Cost</span>
            <span class="font-semibold text-primary-600">
                Rp {{ number_format($record->total_rental_cost, 0, ',', '.') }}
            </span>
        </div>
    </div>

    <!-- Return Schedule -->
    <div class="p-4 rounded-xl border bg-white">
        <h3 class="text-sm font-semibold text-gray-700 mb-3">
            Return Schedule
        </h3>

        <div class="grid grid-cols-2 gap-y-2">
            <span class="text-gray-500">Borrow Date</span>
            <span>{{ \Carbon\Carbon::parse($record->borrow_date)->format('d M Y') }}</span>

            <span class="text-gray-500">Estimated Return</span>
            <span>{{ \Carbon\Carbon::parse($record->estimated_return_date)->format('d M Y') }}</span>

            <span class="text-gray-500">Late Fine</span>
            <span class="text-danger-600 font-medium">
                Rp 5,000 / day
            </span>
        </div>
    </div>

</div>
