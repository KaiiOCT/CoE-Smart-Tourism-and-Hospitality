<x-app-layout>
    <div>
        <div class="flex justify-between">
            <div class="">
                <h1 class="text-2xl font-semibold">Edit Pengabdian Masyarakat</h1>
                <p class="text-sm font-medium">
                    Isi Konten untuk Edit Pengabdian Masyarakat :
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

        <form action="{{ route('admin.service.update', $service) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="deleted_photos" id="deleted_photos" value="">
            <input type="hidden" name="deleted_logos" id="deleted_logos" value="">
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
                            value="{{ old('title', $service->title) }}"
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
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500">{{ old('description', $service->description) }}</textarea>
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
                                    @foreach($service->mitra_logos as $logo)
                                    <div class="col-span-1 h-14 relative" data-logo-id="{{ $logo->id }}">
                                        <img src="{{ Storage::url($logo->logo) }}" alt="Logo Mitra"
                                            class="h-full w-full rounded-sm object-cover">
                                        <button type="button" onclick="deleteLogo({{ $logo->id }}, this.parentElement)"
                                            class="absolute -right-2 -top-2 rounded-full bg-red-500 p-1 text-white hover:bg-red-600">
                                            <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    @endforeach
                                </div>
                                <div id="mitra-logos-placeholder" class="grid min-h-40 place-items-center {{ count($service->mitra_logos) > 0 ? 'hidden' : '' }}">
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
                            value="{{ old('category', $service->category) }}"
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
                            value="{{ old('client', $service->client) }}"
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
                                    @foreach($service->photos as $photo)
                                    <div class="col-span-1 h-20 relative" data-photo-id="{{ $photo->id }}">
                                        <img src="{{ Storage::url($photo->photo) }}" alt="Documentation Photo"
                                            class="h-full w-full rounded-sm object-cover">
                                        <button type="button" onclick="deletePhoto({{ $photo->id }}, this.parentElement)"
                                            class="absolute -right-2 -top-2 rounded-full bg-red-500 p-1 text-white hover:bg-red-600">
                                            <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    @endforeach
                                </div>
                                <div id="photos-placeholder" class="grid min-h-40 place-items-center {{ count($service->photos) > 0 ? 'hidden' : '' }}">
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
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500">{{ old('jobs', $service->jobs) }}</textarea>
                        @error('jobs')
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
        let deletedPhotoIds = [];
        let deletedLogoIds = [];

        function deletePhoto(photoId, element) {
            deletedPhotoIds.push(photoId);
            document.getElementById('deleted_photos').value = deletedPhotoIds.join(',');
            element.remove();
            
            if (document.getElementById('photos-preview').children.length === 0) {
                document.getElementById('photos-placeholder').classList.remove('hidden');
            }
        }

        function deleteLogo(logoId, element) {
            deletedLogoIds.push(logoId);
            document.getElementById('deleted_logos').value = deletedLogoIds.join(',');
            element.remove();
            
            if (document.getElementById('mitra-logos-preview').children.length === 0) {
                document.getElementById('mitra-logos-placeholder').classList.remove('hidden');
            }
        }

        function previewMitraLogos(input) {
            const preview = document.getElementById('mitra-logos-preview');
            const placeholder = document.getElementById('mitra-logos-placeholder');
            
            if (input.files && input.files.length > 0) {
                placeholder.classList.add('hidden');
                
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
            }
        }

        function resetMitraLogos() {
            const input = document.getElementById('mitra_logos');
            const preview = document.getElementById('mitra-logos-preview');
            const placeholder = document.getElementById('mitra-logos-placeholder');
            
            input.value = '';
            preview.innerHTML = '';
            placeholder.classList.remove('hidden');
            
            // Add all existing logos to deleted list
            const existingLogos = document.querySelectorAll('[data-logo-id]');
            existingLogos.forEach(logo => {
                deletedLogoIds.push(logo.dataset.logoId);
            });
            document.getElementById('deleted_logos').value = deletedLogoIds.join(',');
        }

        function previewPhotos(input) {
            const preview = document.getElementById('photos-preview');
            const placeholder = document.getElementById('photos-placeholder');
            
            if (input.files && input.files.length > 0) {
                placeholder.classList.add('hidden');
                
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
            }
        }

        function resetPhotos() {
            const input = document.getElementById('photos');
            const preview = document.getElementById('photos-preview');
            const placeholder = document.getElementById('photos-placeholder');
            
            input.value = '';
            preview.innerHTML = '';
            placeholder.classList.remove('hidden');
            
            // Add all existing photos to deleted list
            const existingPhotos = document.querySelectorAll('[data-photo-id]');
            existingPhotos.forEach(photo => {
                deletedPhotoIds.push(photo.dataset.photoId);
            });
            document.getElementById('deleted_photos').value = deletedPhotoIds.join(',');
        }
    </script>
    @endpush
</x-app-layout>