<x-app-layout>
    <div>
        <livewire:admin.components.search-input
            :search="$search"
            placeholder="Cari Innovillage" />
        @if (count($innovillages) > 0)
        <div class="mt-5 grid grid-cols-3 gap-3 md:grid-cols-6 lg:grid-cols-9">
            @foreach ($innovillages as $innovillage)
            <livewire:admin.activity.research.innovillage.innovillage-card
                :innovillage="$innovillage"
                wire:key="{{ $innovillage->id }}" />
            @endforeach
        </div>
        @else
        <livewire:admin.components.empty-data />
        @endif
    </div>

</x-app-layout>