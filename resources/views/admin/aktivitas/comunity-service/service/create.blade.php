<x-app-layout>
    <div>
        <div class="flex justify-between">
            <div class="">
                <h1 class="text-2xl font-semibold">
                    Managemen Tambah Pengabdian Masyarakat
                </h1>
                <p class="text-sm font-medium">
                    Isi Konten untuk tambah Pengabdian Masyarakat :
                </p>
            </div>
            <a
                href="{{ route("admin.service.index") }}"
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

        <form action="{{ route('admin.service.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-3 flex flex-wrap md:flex-nowrap md:space-x-10">
                <div class="basis-full md:basis-7/12">
                    <div class="mb-6">
                        <label
                            for="title-input"
                            class="mb-2 block text-sm font-medium text-gray-900">
                            Judul Pengabdian Masyarakat
                        </label>
                        <input
                            type="text"
                            name="title"
                            id="title-input"
                            value="{{ old('title') }}"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" />
                        @error('title')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label
                            for="description-input"
                            class="mb-2 block text-sm font-medium text-gray-900">
                            Deskripsi Pengabdian Masyarakat
                        </label>
                        <textarea
                            name="description"
                            id="description-input"
                            rows="4"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500">{{ old('description') }}</textarea>
                        @error('description')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="" class="mb-2 block text-sm font-medium text-gray-900">
                            Foto Logo Mitra
                        </label>
                        <div class="rounded-lg bg-blue1 p-4">
                            <div class="min-h-40">
                                <div id="mitra-logos-preview" class="mt-2 grid grid-cols-5 gap-2 md:grid-cols-8">
                                </div>
                                <div id="mitra-logos-placeholder" class="grid min-h-40 place-items-center">
                                    <p class="text-center text-base font-medium text-gray-500">
                                        Pilih Gambar Logo Mitra
                                        <br />
                                        max 50 gambar
                                    </p>
                                </div>
                            </div>
                            <div class="mt-5 w-full text-end">
                                <label
                                    for="mitra_logos"
                                    class="me-2 cursor-pointer rounded-xl border border-gray-800 px-3 py-0.5 text-sm font-medium text-gray-900 focus:outline-none">
                                    Tambah
                                    <input
                                        type="file"
                                        name="mitra_logos[]"
                                        id="mitra_logos"
                                        multiple
                                        accept="image/*"
                                        class="hidden"
                                        onchange="previewMitraLogos(this)" />
                                </label>
                                <button
                                    type="button"
                                    onclick="resetMitraLogos()"
                                    class="rounded-xl border border-gray-800 px-3 py-0.5 text-sm font-medium text-gray-900 focus:outline-none">
                                    Reset
                                </button>
                            </div>
                        </div>
                        @error('mitra_logos')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        @error('mitra_logos.*')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label
                            for="category-input"
                            class="mb-2 block text-sm font-medium text-gray-900">
                            Kategori
                        </label>
                        <input
                            type="text"
                            name="category"
                            id="category-input"
                            value="{{ old('category') }}"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" />
                        @error('category')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label
                            for="client-input"
                            class="mb-2 block text-sm font-medium text-gray-900">
                            Client
                        </label>
                        <input
                            type="text"
                            name="client"
                            id="client-input"
                            value="{{ old('client') }}"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" />
                        @error('client')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="basis-full md:basis-5/12">
                    <div class="mb-6">
                        <label for="" class="mb-2 block text-sm font-medium text-gray-900">
                            Foto Dokumentasi
                        </label>
                        <div class="rounded-lg bg-blue1 p-4">
                            <div class="min-h-40">
                                <div id="photos-preview" class="mt-2 grid grid-cols-3 gap-1">
                                </div>
                                <div id="photos-placeholder" class="grid min-h-40 place-items-center">
                                    <p class="text-base font-medium text-gray-500">
                                        Max 6 Dokumentasi
                                    </p>
                                </div>
                            </div>
                            <div class="mt-5 w-full text-end">
                                <label
                                    for="photos"
                                    class="me-2 cursor-pointer rounded-xl border border-gray-800 px-3 py-0.5 text-sm font-medium text-gray-900 focus:outline-none">
                                    Tambah
                                    <input
                                        type="file"
                                        name="photos[]"
                                        id="photos"
                                        multiple
                                        accept="image/*"
                                        class="hidden"
                                        onchange="previewPhotos(this)" />
                                </label>
                                <button
                                    type="button"
                                    onclick="resetPhotos()"
                                    class="rounded-xl border border-gray-800 px-3 py-0.5 text-sm font-medium text-gray-900 focus:outline-none">
                                    Reset
                                </button>
                            </div>
                        </div>
                        @error('photos')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        @error('photos.*')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label
                            for="jobs-input"
                            class="mb-2 block text-sm font-medium text-gray-900">
                            Apa saja yang kami kerjakan
                        </label>
                        <textarea
                            name="jobs"
                            id="jobs-input"
                            rows="4"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500">{{ old('jobs') }}</textarea>
                        @error('jobs')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <button
                type="submit"
                class="w-full rounded-lg bg-blue-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 sm:w-auto">
                Post Pengabdian Masyarakat
            </button>
        </form>
    </div>

    @push('scripts')
    <script>
        function previewMitraLogos(input) {
            const preview = document.getElementById('mitra-logos-preview');
            const placeholder = document.getElementById('mitra-logos-placeholder');
            
            if (input.files && input.files.length > 0) {
                placeholder.classList.add('hidden');
                preview.innerHTML = '';
                
                Array.from(input.files).forEach(file => {
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        const div = document.createElement('div');
                        div.className = 'col-span-1 h-14';
                        div.innerHTML = `
                            <img src="${e.target.result}" alt="Logo preview" class="h-full w-full rounded-sm object-cover">
                        `;
                        preview.appendChild(div);
                    }
                    
                    reader.readAsDataURL(file);
                });
            } else {
                preview.innerHTML = '';
                placeholder.classList.remove('hidden');
            }
        }

        function resetMitraLogos() {
            const input = document.getElementById('mitra_logos');
            const preview = document.getElementById('mitra-logos-preview');
            const placeholder = document.getElementById('mitra-logos-placeholder');
            
            input.value = '';
            preview.innerHTML = '';
            placeholder.classList.remove('hidden');
        }

        function previewPhotos(input) {
            const preview = document.getElementById('photos-preview');
            const placeholder = document.getElementById('photos-placeholder');
            
            if (input.files && input.files.length > 0) {
                placeholder.classList.add('hidden');
                preview.innerHTML = '';
                
                Array.from(input.files).forEach(file => {
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        const div = document.createElement('div');
                        div.className = 'col-span-1 h-20';
                        div.innerHTML = `
                            <img src="${e.target.result}" alt="Photo preview" class="h-full w-full rounded-sm object-cover">
                        `;
                        preview.appendChild(div);
                    }
                    
                    reader.readAsDataURL(file);
                });
            } else {
                preview.innerHTML = '';
                placeholder.classList.remove('hidden');
            }
        }

        function resetPhotos() {
            const input = document.getElementById('photos');
            const preview = document.getElementById('photos-preview');
            const placeholder = document.getElementById('photos-placeholder');
            
            input.value = '';
            preview.innerHTML = '';
            placeholder.classList.remove('hidden');
        }
    </script>
    @endpush
</x-app-layout>