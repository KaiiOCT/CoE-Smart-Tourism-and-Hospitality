<x-app-layout>
    <div>
        <div class="flex justify-between">
            <div class="">
                <h1 class="text-2xl font-semibold">
                    Managemen Konten Pengabdian Masyarakat
                </h1>
                <p class="text-sm font-medium">Pilih Konten untuk mengedit :</p>
            </div>
            <a
                href="{{ route("admin.community-service.index") }}"
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
                href="{{ route("admin.service.create") }}"
                class="rounded-xl bg-yellow-400 px-5 py-1.5 text-base font-medium hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300">
                Tambah Pengabdian Masyarakat
            </a>
            <a
                href="{{ route("admin.activity") }}"
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

        @if(count($community_services) > 0)
        <div class="mt-5 grid grid-cols-3 gap-3 md:grid-cols-6 lg:grid-cols-9">
            @foreach($community_services as $community_service)
            <div class="col-span-3 overflow-hidden rounded-3xl border-2 p-4">
                <div class="lg:flex lg:flex-row-reverse lg:gap-x-2">
                    <div class="relative mb-4 h-32 w-full overflow-hidden rounded-md lg:h-20 lg:basis-6/12">
                        <img
                            class="h-full w-full object-cover"
                            src="{{ $community_service->first_photo->photo_url }}"
                            alt="{{ $community_service->title }}" />
                    </div>
                    <div class="my-auto space-y-1 lg:basis-7/12">
                        <h5 class="text-base font-bold text-gray-900 lg:text-xs">
                            {{ $community_service->title }}
                        </h5>
                        <p class="text-gray-500">{{ $community_service->category }}</p>
                        <p class="text-gray-500">{{ $community_service->client }}</p>
                    </div>
                </div>
                <div class="flex justify-end space-x-1">
                    <form action="{{ route('admin.service.destroy', $community_service) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')"
                            class="rounded-full border border-red-500 px-8 py-1.5 text-center text-sm font-medium text-red-500 hover:bg-red-500 hover:text-white focus:outline-none focus:ring-4 focus:ring-red-300">
                            Hapus
                        </button>
                    </form>
                    <a href="{{ route('admin.service.edit', $community_service) }}"
                        class="rounded-full border border-green-500 px-8 py-1.5 text-center text-sm font-medium text-green-500 hover:bg-green-500 hover:text-white focus:outline-none focus:ring-4 focus:ring-green-300">
                        Edit
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="my-6 text-center">
            <img src="{{ asset('assets/icons/empty-date.webp') }}" alt="" srcset="" class="mx-auto h-32" />
            <p class="mt-2 text-base font-medium">Data tidak ditemukan</p>
        </div>
        @endif
    </div>

</x-app-layout>