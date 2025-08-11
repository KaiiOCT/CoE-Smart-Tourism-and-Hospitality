<x-app-layout>
    <div>
        <div class="flex justify-between">
            <div class="">
                <h1 class="text-2xl font-semibold">Tambah Kedai CoE</h1>
                <p class="text-sm font-medium">Isi Konten untuk tambah Kedai CoE :</p>
            </div>
            <a
                href="{{ route("admin.shop.index") }}"
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

        <form action="{{ route('admin.shop.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-3 flex flex-wrap md:flex-nowrap md:space-x-10">
                <div class="basis-full md:basis-7/12">
                    <div class="mb-6">
                        <label
                            for="title-input"
                            class="mb-2 block text-sm font-medium text-gray-900">
                            Judul Kedai
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
                            Deskripsi Kedai
                        </label>
                        <textarea
                            name="description"
                            id="description-input"
                            rows="4"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                            placeholder="">{{ old('description') }}</textarea>
                        @error('description')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6 flex flex-col md:space-x-10 lg:flex-row">
                        <div class="col-span-full mb-6 lg:col-span-4">
                            <label
                                for="instagram-input"
                                class="mb-2 block text-sm font-medium text-gray-900">
                                Instagram
                            </label>
                            <input
                                type="text"
                                name="instagram"
                                id="instagram-input"
                                value="{{ old('instagram') }}"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" />
                            @error('instagram')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-span-full lg:col-span-4">
                            <label
                                for="whatsapp-input"
                                class="mb-2 block text-sm font-medium text-gray-900">
                                Whatsapp
                            </label>
                            <input
                                type="text"
                                name="whatsapp"
                                id="whatsapp-input"
                                value="{{ old('whatsapp') }}"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" />
                            @error('whatsapp')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="basis-full md:basis-5/12">
                    <div class="mb-6">
                        <label for="" class="mb-2 block text-sm font-medium text-gray-900">
                            Foto Produk
                        </label>
                        <div class="rounded-lg bg-blue1 p-4">
                            <div class="min-h-40">
                                <div id="preview" class="mt-2 hidden grid grid-cols-3 gap-1"></div>
                                <div id="placeholder" class="grid min-h-40 place-items-center">
                                    <p class="text-base font-medium text-gray-500">
                                        Upload Foto Produk
                                    </p>
                                </div>
                            </div>
                            <div class="mt-5 w-full text-end">
                                <label for="photos"
                                    class="me-2 cursor-pointer rounded-xl border border-gray-800 px-3 py-0.5 text-sm font-medium text-gray-900 focus:outline-none hover:bg-gray-100">
                                    Tambah
                                    <input type="file" name="photos[]" id="photos" multiple accept="image/*"
                                        class="hidden" onchange="previewImages(this)" />
                                </label>
                                <button type="button" data-modal-target="reset-modal" data-modal-toggle="reset-modal"
                                    class="rounded-xl border border-gray-800 px-3 py-0.5 text-sm font-medium text-gray-900 focus:outline-none hover:bg-gray-100">
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
                </div>
            </div>
            <button
                type="submit"
                class="w-full rounded-lg bg-blue-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 sm:w-auto">
                Post Kedai
            </button>
        </form>

        <div id="reset-modal" tabindex="-1"
            class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
            <div class="relative max-h-full w-full max-w-md p-4">
                <div class="relative rounded-lg bg-white shadow">
                    <button type="button"
                        class="absolute end-2.5 top-3 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900"
                        data-modal-hide="reset-modal">
                        <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 text-center md:p-5">
                        <svg class="mx-auto mb-4 h-12 w-12 text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500">
                            Yakin ingin menghapus?
                        </h3>
                        <button type="button" onclick="resetImages()" data-modal-hide="reset-modal"
                            class="inline-flex items-center rounded-lg bg-red-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300">
                            Ya, hapus
                        </button>
                        <button data-modal-hide="reset-modal" type="button"
                            class="ms-3 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100">
                            Tidak
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function previewImages(input) {
            const preview = document.getElementById('preview');
            const placeholder = document.getElementById('placeholder');
            
            if (input.files && input.files.length > 0) {
                preview.innerHTML = '';
                preview.classList.remove('hidden');
                placeholder.classList.add('hidden');

                Array.from(input.files).forEach(file => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const div = document.createElement('div');
                        div.className = 'col-span-1 h-20 relative group';
                        div.innerHTML = `
                            <div class="relative h-full w-full rounded-sm overflow-hidden">
                                <img src="${e.target.result}" 
                                     alt="Preview" 
                                     class="h-full w-full object-cover"/>
                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 transition-all duration-300"></div>
                            </div>
                        `;
                        preview.appendChild(div);
                    }
                    reader.readAsDataURL(file);
                });
            }
        }

        function resetImages() {
            const input = document.getElementById('photos');
            const preview = document.getElementById('preview');
            const placeholder = document.getElementById('placeholder');
            
            input.value = '';
            preview.innerHTML = '';
            preview.classList.add('hidden');
            placeholder.classList.remove('hidden');
        }

        // Initialize Flowbite modal
        document.addEventListener('DOMContentLoaded', function() {
            const resetModalButton = document.querySelector('[data-modal-target="reset-modal"]');
            const resetModal = document.getElementById('reset-modal');
            const confirmResetButton = resetModal.querySelector('[onclick="resetImages()"]');
            
            if (resetModalButton && resetModal) {
                const modalOptions = {
                    placement: 'center',
                    backdrop: 'dynamic',
                    backdropClasses: 'bg-gray-900/50 fixed inset-0 z-40',
                    closable: true
                };
                
                const modal = new flowbite.Modal(resetModal, modalOptions);
                
                // Show modal when reset button is clicked
                resetModalButton.addEventListener('click', () => {
                    modal.show();
                });
                
                // Handle confirm reset
                confirmResetButton.addEventListener('click', () => {
                    resetImages();
                    modal.hide();
                });
                
                // Handle cancel
                const cancelButton = resetModal.querySelector('[data-modal-hide="reset-modal"]');
                if (cancelButton) {
                    cancelButton.addEventListener('click', () => {
                        modal.hide();
                    });
                }
            }
        });
    </script>
    @endpush
</x-app-layout>