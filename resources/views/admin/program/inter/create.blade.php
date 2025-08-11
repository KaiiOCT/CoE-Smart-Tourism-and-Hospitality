<x-app-layout>
    <div>
        <div class="flex justify-between">
            <div class="">
                <h1 class="text-2xl font-semibold">Tambah MBKM dan Magang</h1>
                <p class="text-sm font-medium">Isi Konten untuk tambah program :</p>
            </div>
            <a
                href="{{ route('admin.intern.index') }}"
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

        <form action="{{ route('admin.intern.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-3 flex flex-wrap md:flex-nowrap md:space-x-10">
                <div class="basis-full md:basis-7/12">
                    <div class="mb-6">
                        <label
                            for="name"
                            class="mb-2 block text-sm font-medium text-gray-900">
                            Nama Program
                        </label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            value="{{ old('name') }}"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" />
                        @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label
                            for="description"
                            class="mb-2 block text-sm font-medium text-gray-900">
                            Deskripsi Program
                        </label>
                        <textarea
                            name="description"
                            id="description"
                            rows="4"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                            placeholder="">{{ old('description') }}</textarea>
                        @error('description')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <div class="mb-2 block text-sm font-medium text-gray-900">
                            Project Terkait
                        </div>
                        <div id="projects-container">
                            <div class="mb-3 flex items-center gap-2">
                                <input
                                    type="text"
                                    name="projects[]"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" />
                                <button
                                    type="button"
                                    class="add-project rounded-lg bg-blue-500 px-3 py-2 text-white">
                                    +
                                </button>
                            </div>
                        </div>
                        @error('projects.*')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <div class="mb-2 block text-sm font-medium text-gray-900">
                            Jurusan Terkait
                        </div>
                        <div id="majors-container">
                            <div class="mb-3 flex items-center gap-2">
                                <input
                                    type="text"
                                    name="majors[]"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" />
                                <button
                                    type="button"
                                    class="add-major rounded-lg bg-blue-500 px-3 py-2 text-white">
                                    +
                                </button>
                            </div>
                        </div>
                        @error('majors.*')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="basis-full md:basis-5/12">
                    <div class="mb-6">
                        <label for="photo" class="mb-2 block text-sm font-medium text-gray-900">
                            Poster Program
                        </label>
                        <div class="mb-4 flex w-full items-center justify-center">
                            <label
                                for="photo"
                                class="relative flex h-64 w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 hover:bg-gray-100">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="mb-3 h-10 w-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Klik untuk upload</span> atau drag and drop</p>
                                    <p class="text-xs text-gray-500">PNG, JPG atau JPEG (MAX. 2MB)</p>
                                </div>
                                <input
                                    type="file"
                                    id="photo"
                                    name="photo"
                                    accept="image/*"
                                    class="hidden" />
                            </label>
                        </div>
                        <div id="image-preview" class="hidden h-64 overflow-hidden rounded-lg">
                            <img id="preview-image" class="h-full w-full object-cover" src="#" alt="Preview" />
                        </div>
                        @error('photo')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <button
                type="submit"
                class="w-full rounded-lg bg-blue-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 sm:w-auto">
                Tambah Program
            </button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add project field
            document.querySelector('.add-project').addEventListener('click', function() {
                const container = document.getElementById('projects-container');
                const newRow = document.createElement('div');
                newRow.className = 'mb-3 flex items-center gap-2';
                newRow.innerHTML = `
                    <input
                        type="text"
                        name="projects[]"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" />
                    <button
                        type="button"
                        class="remove-field rounded-lg bg-red-500 px-3 py-2 text-white">
                        -
                    </button>
                `;
                container.appendChild(newRow);

                // Add event listener to new remove button
                newRow.querySelector('.remove-field').addEventListener('click', function() {
                    container.removeChild(newRow);
                });
            });

            // Add major field
            document.querySelector('.add-major').addEventListener('click', function() {
                const container = document.getElementById('majors-container');
                const newRow = document.createElement('div');
                newRow.className = 'mb-3 flex items-center gap-2';
                newRow.innerHTML = `
                    <input
                        type="text"
                        name="majors[]"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" />
                    <button
                        type="button"
                        class="remove-field rounded-lg bg-red-500 px-3 py-2 text-white">
                        -
                    </button>
                `;
                container.appendChild(newRow);

                // Add event listener to new remove button
                newRow.querySelector('.remove-field').addEventListener('click', function() {
                    container.removeChild(newRow);
                });
            });

            // Image preview
            const photoInput = document.getElementById('photo');
            const imagePreview = document.getElementById('image-preview');
            const previewImage = document.getElementById('preview-image');

            photoInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                        imagePreview.classList.remove('hidden');
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
</x-app-layout>