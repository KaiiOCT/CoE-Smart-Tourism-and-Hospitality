<x-app-layout>
    <div>
        <div class="flex justify-between">
            <div class="">
                <h1 class="text-2xl font-semibold">Managemen Konten Inovasi</h1>
                <p class="text-sm font-medium">Pilih Konten untuk mengedit :</p>
            </div>
            <a
                href="{{ route("admin.activity") }}"
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
                href="{{ route("admin.innovation.create") }}"
                class="rounded-xl bg-yellow-400 px-5 py-1.5 text-base font-medium hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300">
                Tambah Inovasi
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

        @if(session('success'))
        <div class="mt-4 rounded-lg bg-green-100 p-4 text-green-700">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="mt-4 rounded-lg bg-red-100 p-4 text-red-700">
            {{ session('error') }}
        </div>
        @endif

        <div class="mt-5">
            @if(count($innovations) > 0)
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                @foreach($innovations as $innovation)
                <div class="overflow-hidden rounded-lg border bg-white p-4 shadow-sm">
                    <div class="lg:flex lg:flex-row-reverse lg:gap-x-2">
                        <div class="relative mb-4 h-32 w-full overflow-hidden rounded-md lg:h-20 lg:basis-6/12">
                            @if($innovation->photos->isNotEmpty())
                                <img class="h-full w-full object-cover" 
                                     src="{{ $innovation->photos->first()->photo_url }}" 
                                     alt="{{ $innovation->title }}" />
                            @else
                                <img class="h-full w-full object-cover" 
                                     src="{{ asset('assets/images/innovation-default.webp') }}" 
                                     alt="Default Innovation Image" />
                            @endif
                        </div>
                        <div class="my-auto space-y-1 lg:basis-7/12">
                            <h5 class="text-base font-bold text-gray-900 lg:text-xs">
                                {{ $innovation->title }}
                            </h5>
                            <p class="text-gray-500">{{ $innovation->category }}</p>
                            <p class="text-gray-500">{{ $innovation->client }}</p>
                        </div>
                    </div>
                    <div class="mt-4 flex justify-end space-x-2">
                        <form action="{{ route('admin.innovation.destroy', $innovation) }}" method="POST"
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus inovasi ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="rounded-full border border-red-500 px-8 py-1.5 text-center text-sm font-medium text-red-500 hover:bg-red-500 hover:text-white focus:outline-none focus:ring-4 focus:ring-red-300">
                                Hapus
                            </button>
                        </form>
                        <a href="{{ route('admin.innovation.edit', $innovation) }}"
                            class="rounded-full border border-green-500 px-8 py-1.5 text-center text-sm font-medium text-green-500 hover:bg-green-500 hover:text-white focus:outline-none focus:ring-4 focus:ring-green-300">
                            Edit
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="mt-4 rounded-lg bg-gray-100 p-8 text-center">
                <p class="text-gray-600">Belum ada inovasi yang ditambahkan</p>
            </div>
            @endif
        </div>
    </div>

</x-app-layout>