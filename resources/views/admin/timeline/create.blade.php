<x-app-layout>
    <div>
        <div class="flex justify-between">
            <div class="">
                <h1 class="text-2xl font-semibold">Tambah Event</h1>
                <p class="text-sm font-medium">Isi Konten untuk tambah event :</p>
            </div>
            <a
                href="{{ route("admin.timeline.index") }}"
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

        @if(session('error'))
        <div class="mb-4 mt-6 rounded-lg bg-red-50 p-4 text-sm text-red-800" role="alert">
            {{ session('error') }}
        </div>
        @endif

        <form action="{{ route('admin.timeline.store') }}" method="POST">
            @csrf
            <div class="mt-10 grid grid-cols-6 gap-x-12 gap-y-5 md:grid-cols-12">
                <div class="col-span-6">
                    <div class="mb-6">
                        <label
                            for="name"
                            class="mb-2 block text-sm font-medium text-gray-900">
                            Nama Event
                        </label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            value="{{ old('name') }}"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                            required />
                        @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label
                            for="start_date"
                            class="mb-2 block text-sm font-medium text-gray-900">
                            Tanggal Mulai
                        </label>
                        <input
                            type="date"
                            name="start_date"
                            id="start_date"
                            value="{{ old('start_date') }}"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 lg:w-2/4"
                            required />
                        @error('start_date')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label
                            for="end_date"
                            class="mb-2 block text-sm font-medium text-gray-900">
                            Tanggal Selesai
                        </label>
                        <input
                            type="date"
                            name="end_date"
                            id="end_date"
                            value="{{ old('end_date') }}"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 lg:w-2/4"
                            required />
                        @error('end_date')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label
                            for="category"
                            class="mb-2 block text-sm font-medium text-gray-900">
                            Kategori
                        </label>
                        <select
                            name="category"
                            id="category"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 lg:w-2/4"
                            required>
                            <option value="">Pilih Kategori</option>
                            <option value="lkm" {{ old('category') == 'lkm' ? 'selected' : '' }}>LKM</option>
                            <option value="external" {{ old('category') == 'external' ? 'selected' : '' }}>Eksternal</option>
                        </select>
                        @error('category')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <button
                type="submit"
                class="w-full rounded-lg bg-blue-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 sm:w-auto">
                Simpan Event
            </button>
        </form>
    </div>
</x-app-layout>