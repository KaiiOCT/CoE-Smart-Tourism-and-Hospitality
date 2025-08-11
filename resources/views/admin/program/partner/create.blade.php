<x-app-layout>
    <div>
        <div class="flex justify-between">
            <div class="">
                <h1 class="text-2xl font-semibold">Managemen Tambah Partner</h1>
                <p class="text-sm font-medium">Isi Konten untuk tambah Partner :</p>
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

        <form action="{{ route('admin.partner.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-10 grid grid-cols-6 gap-x-12 gap-y-5 md:grid-cols-12" id="partners-container">
                <div class="col-span-6">
                    <div class="mt-10 grid grid-cols-6 gap-x-5 md:grid-cols-12">
                        <div class="col-span-6">
                            <label
                                for="partner-photo-0"
                                class="mb-2 block text-sm font-medium text-gray-900">
                                Logo Partner 1
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
                                        class="hidden photo-input" 
                                        required />
                                </label>
                            </div>
                            <div id="photo-preview-0" class="mt-2 hidden h-40 overflow-hidden rounded-lg">
                                <img id="preview-image-0" class="h-full w-full object-cover" src="#" alt="Preview" />
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
                                    value="{{ old('names.0') }}"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" 
                                    required />
                                @error('names.0')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label
                                    for="program-input-0"
                                    class="mb-2 block text-sm font-medium text-gray-900">
                                    Nama Program
                                </label>
                                <input
                                    type="text"
                                    name="programs[0]"
                                    id="program-input-0"
                                    value="{{ old('programs.0') }}"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" 
                                    required />
                                @error('programs.0')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button
                type="button"
                id="add-partner-btn"
                class="my-5 block w-full rounded-lg bg-[#0FA6567A] px-5 py-1 text-base font-medium focus:outline-none md:w-4/12">
                Tambah Partner
            </button>
            <button
                type="submit"
                class="w-full rounded-lg bg-blue-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 sm:w-auto">
                Post Partner
            </button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let partnerCount = 1;
            
            // Set up image preview for first partner
            setupImagePreview(0);
            
            // Add partner button handler
            document.getElementById('add-partner-btn').addEventListener('click', function() {
                const partnersContainer = document.getElementById('partners-container');
                
                const newPartnerHtml = `
                <div class="col-span-6 partner-item" id="partner-${partnerCount}">
                    <div class="mt-10 grid grid-cols-6 gap-x-5 md:grid-cols-12">
                        <div class="col-span-6">
                            <div class="flex items-center justify-between">
                                <label
                                    for="partner-photo-${partnerCount}"
                                    class="mb-2 block text-sm font-medium text-gray-900">
                                    Logo Partner ${partnerCount + 1}
                                </label>
                                <button 
                                    type="button" 
                                    class="remove-partner text-red-500 hover:text-red-700"
                                    data-target="partner-${partnerCount}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                            <div
                                class="mt-1 flex w-full items-center justify-start md:justify-center">
                                <label
                                    for="partner-photo-${partnerCount}"
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
                                        id="partner-photo-${partnerCount}" 
                                        name="photos[${partnerCount}]" 
                                        accept="image/*"
                                        class="hidden photo-input" 
                                        required />
                                </label>
                            </div>
                            <div id="photo-preview-${partnerCount}" class="mt-2 hidden h-40 overflow-hidden rounded-lg">
                                <img id="preview-image-${partnerCount}" class="h-full w-full object-cover" src="#" alt="Preview" />
                            </div>
                        </div>
                        <div class="col-span-6 lg:mt-5">
                            <div class="mb-6">
                                <label
                                    for="name-input-${partnerCount}"
                                    class="mb-2 block text-sm font-medium text-gray-900">
                                    Nama Partner
                                </label>
                                <input
                                    type="text"
                                    name="names[${partnerCount}]"
                                    id="name-input-${partnerCount}"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" 
                                    required />
                            </div>
                            <div class="mb-6">
                                <label
                                    for="program-input-${partnerCount}"
                                    class="mb-2 block text-sm font-medium text-gray-900">
                                    Nama Program
                                </label>
                                <input
                                    type="text"
                                    name="programs[${partnerCount}]"
                                    id="program-input-${partnerCount}"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" 
                                    required />
                            </div>
                        </div>
                    </div>
                </div>
                `;
                
                // Insert the new partner HTML
                partnersContainer.insertAdjacentHTML('beforeend', newPartnerHtml);
                
                // Set up image preview for new partner
                setupImagePreview(partnerCount);
                
                // Set up remove button for new partner
                setupRemoveButtons();
                
                partnerCount++;
            });
            
            // Function to set up image preview
            function setupImagePreview(index) {
                const photoInput = document.getElementById(`partner-photo-${index}`);
                const photoPreview = document.getElementById(`photo-preview-${index}`);
                const previewImage = document.getElementById(`preview-image-${index}`);
                
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
            }
            
            // Function to set up remove buttons
            function setupRemoveButtons() {
                document.querySelectorAll('.remove-partner').forEach(button => {
                    button.addEventListener('click', function() {
                        const targetId = this.getAttribute('data-target');
                        const partnerElement = document.getElementById(targetId);
                        if (partnerElement) {
                            partnerElement.remove();
                        }
                    });
                });
            }
        });
    </script>
</x-app-layout>