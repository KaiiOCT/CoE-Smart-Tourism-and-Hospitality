<x-app-layout>
    <div>
        <div class="flex justify-between">
            <div class="">
                <h1 class="text-2xl font-semibold">Managemen Konten Timeline</h1>
                <p class="text-sm font-medium">Pilih Konten untuk mengedit :</p>
            </div>
            <a href="{{ route("admin.home") }}" class="hidden font-medium md:block">
                <svg
                    class="inline h-6 w-6"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="3"
                    stroke-linecap="round"
                    stroke-linejoin="round">
                    <line x1="20" y1="12" x2="5" y2="12" />
                    <polyline points="10 18 5 12 10 6" />
                </svg>
                Kembali
            </a>
        </div>

        @if(session('success'))
        <div class="mb-4 mt-6 rounded-lg bg-green-50 p-4 text-sm text-green-800" role="alert">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="mb-4 mt-6 rounded-lg bg-red-50 p-4 text-sm text-red-800" role="alert">
            {{ session('error') }}
        </div>
        @endif

        <div class="mt-3 flex justify-between">
            <a
                href="{{ route("admin.timeline.create") }}"
                class="rounded-xl bg-yellow-400 px-5 py-1.5 text-base font-medium hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300">
                Tambah Event
            </a>
            <a
                href="{{ route("admin.home") }}"
                class="rounded-xl bg-gray-200 px-5 py-1.5 text-base font-medium md:hidden">
                <svg
                    class="inline h-6 w-6"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="3"
                    stroke-linecap="round"
                    stroke-linejoin="round">
                    <line x1="20" y1="12" x2="5" y2="12" />
                    <polyline points="10 18 5 12 10 6" />
                </svg>
                Kembali
            </a>
        </div>

        <div class="mt-6">
            <form action="{{ route('admin.timeline.index') }}" method="GET">
                <div class="relative">
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari Event"
                        class="w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                    />
                    <button type="submit" class="absolute right-2.5 top-2.5">
                        <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </button>
                </div>
            </form>

            @if (count($events) > 0)
            <div class="mt-5 grid grid-cols-3 gap-3 md:grid-cols-6 lg:grid-cols-9">
                @foreach ($events as $event)
                <div class="col-span-3 overflow-hidden rounded-3xl border-2 p-4">
                    <div class="text-base">
                        <p class="line-clamp-1 font-bold text-gray-900">{{ $event->name }}</p>
                        <p class="text-gray-500">{{ $event->formatted_category }}</p>
                        <p class="text-sm text-gray-400">{{ $event->formatted_start_date }} - {{ $event->formatted_end_date }}</p>
                    </div>
                    <div class="mt-5 flex justify-evenly space-x-1 md:px-5">
                        <form action="{{ route('admin.timeline.destroy', $event) }}" method="POST" class="w-full">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                onclick="return confirm('Apakah Anda yakin ingin menghapus event ini?')"
                                class="w-full rounded-full border border-red-500 px-5 py-1.5 text-center text-sm font-medium text-red-500 hover:bg-red-500 hover:text-white focus:outline-none focus:ring-4 focus:ring-red-300">
                                Hapus
                            </button>
                        </form>
                        <a
                            href="{{ route('admin.timeline.edit', $event) }}"
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
    </div>
</x-app-layout>