<x-app-layout>
    <div>
        <livewire:admin.components.search-input
            :search="$search"
            placeholder="Cari Jurnal" />
        @if (count($journals) > 0)
        <div class="mt-5 grid grid-cols-3 gap-3 md:grid-cols-6 lg:grid-cols-9">
            @foreach ($journals as $journal)
            <livewire:admin.activity.research.journal.journal-card
                :journal="$journal"
                wire:key="{{ $journal->id }}" />
            @endforeach
        </div>
        @else
        <livewire:admin.components.empty-data />
        @endif
    </div>

</x-app-layout>