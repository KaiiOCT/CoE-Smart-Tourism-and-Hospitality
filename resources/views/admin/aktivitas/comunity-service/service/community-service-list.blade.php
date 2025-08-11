<x-app-layout>
    <div>
        <livewire:admin.components.search-input
            :search="$search"
            placeholder="Cari Pengabdian Masyarakat" />
        @if (count($community_services) > 0)
        <div class="mt-5 grid grid-cols-3 gap-3 md:grid-cols-6 lg:grid-cols-9">
            @foreach ($community_services as $community_service)
            <livewire:admin.activity.community-service.community-service.community-service-card
                :community_service="$community_service"
                wire:key="{{ $community_service->id }}" />
            @endforeach
        </div>
        @else
        <livewire:admin.components.empty-data />
        @endif
    </div>

</x-app-layout>