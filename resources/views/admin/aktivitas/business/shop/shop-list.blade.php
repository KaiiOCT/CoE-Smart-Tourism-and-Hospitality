<x-app-layout>
    <div>
        <livewire:admin.components.search-input
            :search="$search"
            placeholder="Cari Kedai" />
        @if (count($shops) > 0)
        <div class="mt-5 grid grid-cols-3 gap-3 md:grid-cols-6 lg:grid-cols-9">
            @foreach ($shops as $shop)
            <livewire:admin.activity.business.shop.shop-card
                :shop="$shop"
                wire:key="{{ $shop->id }}" />
            @endforeach
        </div>
        @else
        <livewire:admin.components.empty-data />
        @endif
    </div>

</x-app-layout>