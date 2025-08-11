<x-app-layout>
    <div>
        <div class="flex justify-between">
            <div class="">
                <h1 class="text-2xl font-semibold">Managemen Edit Partner</h1>
                <p class="text-sm font-medium">Isi Konten untuk edit Partner :</p>
            </div>
            <a
                href="{{ route('admin.partner.index') }}"
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

        <form action="{{ route('admin.partner.update', $partner) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mt-10 grid grid-cols-6 gap-x-12 gap-y-5 md:grid-cols-12">
                <div class="col-span-6">
                    <div class="mt-10 grid grid-cols-6 gap-x-5 md:grid-cols-12">
                        <div class="col-span-6">
                            <label for="current-photo" class="mb-2 block text-sm font-medium text-gray-900">
                                Logo Partner Saat Ini
                            </label>
                            <div class="mb-4 h-40 overflow-hidden rounded-lg">
                                <img src="{{ asset('storage/' . $partner->photo) }}" alt="{{ $partner->name }}" class="h-full w-full object-cover" />
                            </div>
                            
                            <label for="partner-photo-0" class="mb-2 block text-sm font-medium text-gray-900">
                                Ubah Logo Partner (Opsional)
                            </label>
                            <div
                                class="mt-1 flex w-full items-center justify-start md:justify-center">
                                <label
                                    for="partner-photo-0"
                                    class="relative flex h-40 w-2/3 cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 hover:bg-gray-100 md:w-full">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="mb-3 h-10 w-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Klik untuk upload</span> atau drag and drop</p>
                                        <p class="text-xs text-gray-500">PNG, JPG atau JPEG (MAX. 2MB)</p>
                                    </div>
                                    <input
                                        type="file" 
                                        id="partner-photo-0" 
                                        name="photos[0]" 
                                        accept="image/*"
                                        class="hidden" />
                                </label>
                            </div>
                            <div id="photo-preview" class="mt-2 hidden h-40 overflow-hidden rounded-lg">
                                <img id="preview-image" class="h-full w-full object-cover" src="#" alt="Preview" />
                            </div>
                            @error('photos.0')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-span-6 lg:mt-5">
                            <div class="mb-6">
                                <label
                                    for="name-input-0"
                                    class="mb-2 block text-sm font-medium text-gray-900">
                                    Nama Partner
                                </label>
                                <input
                                    type="text"
                                    name="names[0]"
                                    id="name-input-0"
                                    value="{{ old('names.0', $partner->name) }}"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" />
                                @error('names.0')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label
                                    for="program-input-0"
                                    class="mb-2 block text-sm font-medium text-gray-900">
                                    Jabatan
                                </label>
                                <input
                                    type="text"
                                    name="programs[0]"
                                    id="program-input-0"
                                    value="{{ old('programs.0', $partner->program) }}"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" />
                                @error('programs.0')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Image preview functionality
            const photoInput = document.getElementById('partner-photo-0');
            const photoPreview = document.getElementById('photo-preview');
            const previewImage = document.getElementById('preview-image');
            
            photoInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                        photoPreview.classList.remove('hidden');
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
</x-app-layout>