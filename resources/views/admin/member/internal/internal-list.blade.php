<x-app-layout>
    <div>
        <form action="{{ route('admin.internal-member.index') }}" method="GET">
            <div class="relative">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari Anggota"
                    class="w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                />
                <button type="submit" class="absolute right-2.5 top-2.5">
                    <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </button>
            </div>
        </form>

        @if (count($members) > 0)
        <div class="mt-5 grid grid-cols-3 gap-3 md:grid-cols-6 lg:grid-cols-9">
            @foreach ($members as $member)
            <div class="col-span-3 overflow-hidden rounded-3xl border-2 p-4">
                <div class="relative min-h-32 w-full overflow-hidden rounded-lg md:h-24 lg:min-h-24 lg:basis-6/12">
                    <img
                        class="mx-auto h-full w-1/2 rounded-lg bg-gray-300 object-cover"
                        src="{{ $member->photo_url }}"
                        alt="{{ $member->name }}" />
                </div>
                <div class="text-base">
                    <p class="font-bold text-gray-900">{{ $member->name }}</p>
                    <p class="text-gray-500">{{ $member->position }}</p>
                </div>
                <div class="mt-2 flex justify-evenly space-x-2 md:px-4">
                    <button
                        data-modal-target="delete-modal-{{ $member->id }}"
                        data-modal-toggle="delete-modal-{{ $member->id }}"
                        class="w-full rounded-full border border-red-500 px-5 py-1.5 text-center text-sm font-medium text-red-500 hover:bg-red-500 hover:text-white focus:outline-none focus:ring-4 focus:ring-red-300">
                        Hapus
                    </button>
                    <a
                        href="{{ route('admin.internal-member.edit', ['member' => $member->id]) }}"
                        class="w-full rounded-full border border-green-500 px-5 py-1.5 text-center text-sm font-medium text-green-500 hover:bg-green-500 hover:text-white focus:outline-none focus:ring-4 focus:ring-green-300">
                        Edit
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="my-6 text-center">
            <img
                src="{{ asset('assets/icons/empty-date.webp') }}"
                alt=""
                srcset=""
                class="mx-auto h-32" />
            <p class="mt-2 text-base font-medium">Data tidak ditemukan</p>
        </div>
        @endif
    </div>
</x-app-layout>