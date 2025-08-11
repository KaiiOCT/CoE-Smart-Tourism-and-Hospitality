<x-app-layout>
    <div>
        <div class="flex justify-between">
            <div class="">
                <h1 class="text-2xl font-semibold">Managemen Konten Kedai CoE</h1>
                <p class="text-sm font-medium">Pilih Konten untuk mengedit :</p>
            </div>
            <a
                href="{{ route("admin.business") }}"
                class="hidden font-medium md:block">
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
        <div class="mt-3 flex justify-between">
            <a
                href="{{ route("admin.shop.create") }}"
                class="rounded-xl bg-yellow-400 px-5 py-1.5 text-base font-medium hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300">
                Tambah Kedai CoE
            </a>
            <a
                href="{{ route("admin.business") }}"
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

        @if (count($shops) > 0)
        <div class="mt-5 grid grid-cols-3 gap-3 md:grid-cols-6 lg:grid-cols-9">
            @foreach ($shops as $shop)
            <div class="col-span-3 overflow-hidden rounded-3xl border-2 p-4">
                <div class="relative mb-2 h-32 w-full overflow-hidden rounded-lg lg:h-20 lg:basis-5/12">
                    <img class="mx-auto h-full w-full rounded-lg bg-gray-300 object-cover md:w-2/4"
                        src="{{ $shop->first_photo->photo_url }}" alt="Shop Image" />
                </div>
                <div class="text-center text-base">
                    <p class="font-bold text-gray-900">{{ $shop->title }}</p>
                </div>
                <div class="mt-3 flex justify-evenly space-x-2 md:px-4">
                    <form action="{{ route('admin.shop.destroy', $shop) }}" method="POST" class="w-full">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this shop?')"
                            class="w-full rounded-full border border-red-500 px-5 py-1.5 text-center text-sm font-medium text-red-500 hover:bg-red-500 hover:text-white focus:outline-none focus:ring-4 focus:ring-red-300">
                            Hapus
                        </button>
                    </form>
                    <a href="{{ route('admin.shop.edit', $shop) }}"
                        class="w-full rounded-full border border-green-500 px-5 py-1.5 text-center text-sm font-medium text-green-500 hover:bg-green-500 hover:text-white focus:outline-none focus:ring-4 focus:ring-green-300">
                        Edit
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="mt-6 text-center">
            <p class="text-gray-500">No shops found</p>
        </div>
        @endif
    </div>

</x-app-layout>
