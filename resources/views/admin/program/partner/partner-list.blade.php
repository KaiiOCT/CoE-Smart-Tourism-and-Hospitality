<x-app-layout>
    <div class="">
        <form action="{{ route('admin.partner.index') }}" method="GET">
            <div class="relative">
                <input
                    type="text"
                    name="search" 
                    value="{{ request('search') }}"
                    placeholder="Cari Partner"
                    class="w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                />
                <button type="submit" class="absolute right-2.5 top-2.5">
                    <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </button>
            </div>
        </form>

        @if (count($partners) > 0)
        <div class="mt-5 grid grid-cols-3 gap-3 md:grid-cols-6 lg:grid-cols-9">
            @foreach ($partners as $partner)
                @include('admin.program.partner.partner-card', ['partner' => $partner])
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