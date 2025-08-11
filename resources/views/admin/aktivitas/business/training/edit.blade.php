<x-app-layout>
    <div>
        <div class="flex justify-between">
            <div class="">
                <h1 class="text-2xl font-semibold">Edit Pelatihan</h1>
                <p class="text-sm font-medium">Isi Konten untuk Edit Pelatihan :</p>
            </div>
            <a
                href="{{ route("admin.training.index") }}"
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

        <form action="{{ route('admin.training.update', $training) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mt-3 flex flex-wrap md:flex-nowrap md:space-x-10">
                <div class="basis-full md:basis-7/12">
                    <div class="mb-6">
                        <label
                            for="title-input"
                            class="mb-2 block text-sm font-medium text-gray-900">
                            Judul Pelatihan
                        </label>
                        <input
                            type="text"
                            name="title"
                            id="title-input"
                            value="{{ old('title', $training->title) }}"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" />
                        @error('title')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label
                            for="description-input"
                            class="mb-2 block text-sm font-medium text-gray-900">
                            Deskripsi Pelatihan
                        </label>
                        <textarea
                            name="description"
                            id="description-input"
                            rows="4"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                            placeholder="">{{ old('description', $training->description) }}</textarea>
                        @error('description')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6 flex flex-col justify-between lg:flex-row">
                        <div class="col-span-full mb-6 lg:col-span-4">
                            <label
                                for="date-input"
                                class="mb-2 block text-sm font-medium text-gray-900">
                                Tanggal Pelatihan
                            </label>
                            <input
                                type="date"
                                name="date"
                                id="date-input"
                                value="{{ old('date', $training->date) }}"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" />
                            @error('date')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-span-full mb-6 lg:col-span-4">
                            <label
                                for="location-input"
                                class="mb-2 block text-sm font-medium text-gray-900">
                                Lokasi
                            </label>
                            <input
                                type="text"
                                name="location"
                                id="location-input"
                                value="{{ old('location', $training->location) }}"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" />
                            @error('location')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-span-full lg:col-span-4">
                            <label
                                for="type-input"
                                class="mb-2 block text-sm font-medium text-gray-900">
                                Jenis Pelatihan
                            </label>
                            <input
                                type="text"
                                name="type"
                                id="type-input"
                                value="{{ old('type', $training->type) }}"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" />
                            @error('type')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-6">
                        <label
                            for="link-input"
                            class="mb-2 block text-sm font-medium text-gray-900">
                            Link Pelatihan
                        </label>
                        <input
                            type="text"
                            name="link"
                            id="link-input"
                            value="{{ old('link', $training->link) }}"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" />
                        @error('link')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="basis-full md:basis-5/12">
                    <div class="mb-6">
                        <label for="" class="mb-2 block text-sm font-medium text-gray-900">
                            Foto Pelatihan
                        </label>
                        <div class="flex w-full items-center justify-center">
                            <label
                                for="photo"
                                class="relative flex h-64 w-full cursor-pointer flex-col items-center justify-center rounded-lg bg-blue1">
                                <div id="preview" class="absolute h-full w-full rounded-lg">
                                    <img id="preview-image" src="{{ Storage::url($training->photo) }}" alt="Preview"
                                        class="h-full w-full rounded-lg object-cover" />
                                </div>
                                <div id="placeholder"
                                    class="z-10 flex h-full w-full flex-col items-center justify-center rounded-lg bg-gray-900/25 text-gray-100">
                                    <svg
                                        class="h-8 w-8"
                                        aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        fill="none"
                                        viewBox="0 0 24 24">
                                        <path
                                            stroke="currentColor"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 12h14m-7 7V5" />
                                    </svg>
                                    <p class="mb-2 text-sm">
                                        <span class="font-semibold">Click to edit image</span>
                                    </p>
                                    <p class="text-xs">SVG, PNG, JPG or GIF (MAX. 2MB)</p>
                                </div>
                                <input
                                    type="file"
                                    name="photo"
                                    id="photo"
                                    class="hidden"
                                    accept="image/*"
                                    onchange="previewImage(this)" />
                            </label>
                        </div>
                        @error('photo')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <button
                type="submit"
                class="rounded-lg bg-green-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-green-300">
                Simpan
            </button>
        </form>
    </div>

    @push('scripts')
    <script>
        function previewImage(input) {
            const preview = document.getElementById('preview');
            const placeholder = document.getElementById('placeholder');
            const previewImage = document.getElementById('preview-image');
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    preview.classList.remove('hidden');
                    placeholder.classList.add('hidden');
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    @endpush
</x-app-layout>