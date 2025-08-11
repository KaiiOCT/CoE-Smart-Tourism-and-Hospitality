<x-app-layout>
    <div>
        <livewire:admin.components.search-input
            :search="$search"
            placeholder="Cari Inovasi" />
        @if (count($innovations) > 0)
        <div class="mt-5 grid grid-cols-3 gap-3 md:grid-cols-6 lg:grid-cols-9">
            @foreach ($innovations as $innovation)
            <livewire:admin.activity.innovation.innovation-card
                :innovation="$innovation"
                wire:key="{{ $innovation->id }}" />
            @endforeach
        </div>
        @else
        <div class="my-6 text-center">
            <img
                src="{{ asset("assets/icons/empty-date.webp") }}"
                alt=""
                srcset=""
                class="mx-auto h-32" />
            <p class="mt-2 text-base font-medium">Data tidak ditemukan</p>
        </div>
        @endif
    </div>

</x-app-layout>