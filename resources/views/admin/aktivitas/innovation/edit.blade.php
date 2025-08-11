<x-app-layout>
    <div>
        <div class="flex justify-between">
            <div class="">
                <h1 class="text-2xl font-semibold">Edit Inovasi</h1>
                <p class="text-sm font-medium">Edit Konten Inovasi :</p>
            </div>
            <a href="{{ route('admin.innovation.index') }}" class="hidden font-medium md:block">
                <svg class="inline h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                    stroke-linecap="round" stroke-linejoin="round">
                    <line x1="20" y1="12" x2="5" y2="12" />
                    <polyline points="10 18 5 12 10 6" />
                </svg>
                Kembali
            </a>
        </div>
        <form action="{{ route('admin.innovation.update', $innovation) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mt-3 flex flex-wrap md:flex-nowrap md:space-x-10">
                <div class="basis-full md:basis-7/12">
                    <div class="mb-6">
                        <label for="title-input" class="mb-2 block text-sm font-medium text-gray-900">
                            Judul Inovasi
                        </label>
                        <input type="text" name="title" id="title-input" value="{{ old('title', $innovation->title) }}"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" />
                        @error('title')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="description-input" class="mb-2 block text-sm font-medium text-gray-900">
                            Deskripsi Inovasi
                        </label>
                        <textarea name="description" id="description-input" rows="4"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500">{{ old('description', $innovation->description) }}</textarea>
                        @error('description')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6 flex flex-col md:space-x-10 lg:flex-row">
                        <div class="col-span-full mb-6 lg:col-span-4">
                            <label for="category-input" class="mb-2 block text-sm font-medium text-gray-900">
                                Kategori
                            </label>
                            <input type="text" name="category" id="category-input"
                                value="{{ old('category', $innovation->category) }}"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" />
                            @error('category')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-span-full lg:col-span-4">
                            <label for="client-input" class="mb-2 block text-sm font-medium text-gray-900">
                                Klien
                            </label>
                            <input type="text" name="client" id="client-input"
                                value="{{ old('client', $innovation->client) }}"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" />
                            @error('client')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-6">
                        <label for="" class="mb-2 block text-sm font-medium text-gray-900">
                            Foto Logo Mitra
                        </label>
                        <div class="rounded-lg bg-blue1 p-4">
                            <div class="min-h-40" id="mitra-logos-preview">
                                <div class="grid min-h-40 place-items-center {{ $innovation->mitra_logos->count() > 0 ? 'hidden' : '' }}"
                                    id="mitra-logos-placeholder">
                                    <p class="text-center text-base font-medium text-gray-500">
                                        Pilih Gambar Logo Mitra
                                        <br />
                                        max 50 gambar
                                    </p>
                                </div>
                                <div class="mt-2 grid-cols-5 gap-2 md:grid-cols-8 {{ $innovation->mitra_logos->count() > 0 ? '' : 'hidden' }}"
                                    id="mitra-logos-grid">
                                    @foreach($innovation->mitra_logos as $logo)
                                    <div class="col-span-1 h-14">
                                        <img src="{{ Storage::url($logo->logo) }}" alt="Logo Mitra"
                                            class="h-full w-full rounded-sm object-cover" />
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="mt-5 w-full text-end">
                                <label for="mitra_logos"
                                    class="me-2 cursor-pointer rounded-xl border border-gray-800 px-3 py-0.5 text-sm font-medium text-gray-900 focus:outline-none">
                                    Ganti
                                    <input type="file" name="mitra_logos[]" id="mitra_logos" multiple accept="image/*"
                                        class="hidden" onchange="previewMitraLogos(this)" />
                                </label>
                            </div>
                        </div>
                        @error('mitra_logos')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        @error('mitra_logos.*')
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
                            <div class="min-h-40" id="photos-preview">
                                <div class="grid min-h-40 place-items-center {{ $innovation->photos->count() > 0 ? 'hidden' : '' }}"
                                    id="photos-placeholder">
                                    <p class="text-base font-medium text-gray-500">
                                        Max 6 Dokumentasi
                                    </p>
                                </div>
                                <div class="mt-2 grid-cols-3 gap-1 {{ $innovation->photos->count() > 0 ? '' : 'hidden' }}"
                                    id="photos-grid">
                                    @foreach($innovation->photos as $photo)
                                    <div class="col-span-1 h-20">
                                        <img src="{{ Storage::url($photo->photo) }}" alt="Dokumentasi"
                                            class="h-full w-full rounded-sm object-cover" />
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="mt-5 w-full text-end">
                                <label for="photos"
                                    class="me-2 cursor-pointer rounded-xl border border-gray-800 px-3 py-0.5 text-sm font-medium text-gray-900 focus:outline-none">
                                    Ganti
                                    <input type="file" name="photos[]" id="photos" multiple accept="image/*" class="hidden"
                                        onchange="previewPhotos(this)" />
                                </label>
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
                        <label for="jobs-input" class="mb-2 block text-sm font-medium text-gray-900">
                            Apa saja yang kami kerjakan
                        </label>
                        <textarea name="jobs" id="jobs-input" rows="4"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500">{{ old('jobs', $innovation->jobs) }}</textarea>
                        @error('jobs')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit"
                class="rounded-lg bg-green-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-green-300">
                Simpan Perubahan
            </button>
        </form>
    </div>

    @push('scripts')
    <script>
        function previewMitraLogos(input) {
            const placeholder = document.getElementById('mitra-logos-placeholder');
            const grid = document.getElementById('mitra-logos-grid');
            
            if (input.files && input.files.length > 0) {
                placeholder.classList.add('hidden');
                grid.classList.remove('hidden');
                grid.innerHTML = '';

                Array.from(input.files).forEach(file => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const div = document.createElement('div');
                        div.className = 'col-span-1 h-14';
                        div.innerHTML = `
                            <img src="${e.target.result}" 
                                 alt="Logo Preview" 
                                 class="h-full w-full rounded-sm object-cover"/>
                        `;
                        grid.appendChild(div);
                    }
                    reader.readAsDataURL(file);
                });
            } else {
                resetMitraLogos();
            }
        }

        function previewPhotos(input) {
            const placeholder = document.getElementById('photos-placeholder');
            const grid = document.getElementById('photos-grid');
            
            if (input.files && input.files.length > 0) {
                placeholder.classList.add('hidden');
                grid.classList.remove('hidden');
                grid.innerHTML = '';

                Array.from(input.files).forEach(file => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const div = document.createElement('div');
                        div.className = 'col-span-1 h-20';
                        div.innerHTML = `
                            <img src="${e.target.result}" 
                                 alt="Photo Preview" 
                                 class="h-full w-full rounded-sm object-cover"/>
                        `;
                        grid.appendChild(div);
                    }
                    reader.readAsDataURL(file);
                });
            } else {
                resetPhotos();
            }
        }

        function resetMitraLogos() {
            const input = document.getElementById('mitra_logos');
            const placeholder = document.getElementById('mitra-logos-placeholder');
            const grid = document.getElementById('mitra-logos-grid');
            
            input.value = '';
            placeholder.classList.remove('hidden');
            grid.classList.add('hidden');
            grid.innerHTML = '';
        }

        function resetPhotos() {
            const input = document.getElementById('photos');
            const placeholder = document.getElementById('photos-placeholder');
            const grid = document.getElementById('photos-grid');
            
            input.value = '';
            placeholder.classList.remove('hidden');
            grid.classList.add('hidden');
            grid.innerHTML = '';
        }
    </script>
    @endpush
</x-app-layout>