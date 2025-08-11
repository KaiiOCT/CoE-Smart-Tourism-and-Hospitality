<x-app-layout>
    <div>
        <div class="flex justify-between">
            <div class="">
                <h1 class="text-2xl font-semibold">Edit Jurnal</h1>
                <p class="text-sm font-medium">Isi Konten untuk Edit Jurnal :</p>
            </div>
            <a
                href="{{ route("admin.journal.index") }}"
                class="hidden font-medium md:block">
                <img
                    src="{{ asset("assets/icons/back.png") }}"
                    alt=""
                    srcset=""
                    class="inline" />
                Kembali
            </a>
        </div>
        <form action="{{ route('admin.journal.update', $journal) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mt-3 flex flex-wrap md:flex-nowrap md:space-x-10">
                <div class="basis-full md:basis-7/12">
                    <div class="mb-6">
                        <label
                            for="title-input"
                            class="mb-2 block text-sm font-medium text-gray-900">
                            Judul Jurnal
                        </label>
                        <input
                            type="text"
                            name="title"
                            id="title-input"
                            value="{{ old('title', $journal->title) }}"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" />
                        @error('title')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label
                            for="description-input"
                            class="mb-2 block text-sm font-medium text-gray-900">
                            Deskripsi Jurnal
                        </label>
                        <textarea
                            name="description"
                            id="description-input"
                            rows="4"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500">{{ old('description', $journal->description) }}</textarea>
                        @error('description')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid md:grid-cols-12 md:gap-x-5">
                        <div class="col-span-6 mb-6">
                            <label
                                for="date-input"
                                class="mb-2 block text-sm font-medium text-gray-900">
                                Tanggal Jurnal
                            </label>
                            <input
                                type="date"
                                name="date"
                                id="date-input"
                                value="{{ old('date', $journal->date->format('Y-m-d')) }}"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" />
                            @error('date')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-span-6 mb-6">
                            <label
                                for="writer-input"
                                class="mb-2 block text-sm font-medium text-gray-900">
                                Nama Penulis
                            </label>
                            <input
                                type="text"
                                name="writer"
                                id="writer-input"
                                value="{{ old('writer', $journal->writer) }}"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" />
                            @error('writer')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-6">
                        <label
                            for="doi_link-input"
                            class="mb-2 block text-sm font-medium text-gray-900">
                            Link DOI
                        </label>
                        <input
                            type="text"
                            name="doi_link"
                            id="doi_link-input"
                            value="{{ old('doi_link', $journal->doi_link) }}"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" />
                        @error('doi_link')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label
                            for="journal_link-input"
                            class="mb-2 block text-sm font-medium text-gray-900">
                            Link Jurnal
                        </label>
                        <input
                            type="text"
                            name="journal_link"
                            id="journal_link-input"
                            value="{{ old('journal_link', $journal->journal_link) }}"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" />
                        @error('journal_link')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="basis-full md:basis-5/12">
                    <div class="mb-6">
                        <label for="" class="mb-2 block text-sm font-medium text-gray-900">
                            Foto Jurnal
                        </label>
                        <div class="flex w-full items-center justify-center">
                            <label
                                for="photo-input"
                                class="relative flex h-64 w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 hover:bg-gray-100">
                                @if($journal->photo)
                                <div id="current-image-container" class="absolute inset-0 h-full w-full rounded-lg overflow-hidden">
                                    <img
                                        src="{{ $journal->photo_url }}"
                                        alt="{{ $journal->title }}"
                                        class="h-full w-full object-contain" />
                                </div>
                                @endif
                                <div id="image-preview-container" class="hidden absolute inset-0 h-full w-full rounded-lg overflow-hidden">
                                    <img id="image-preview" src="#" alt="Preview" class="h-full w-full object-contain" />
                                </div>
                                <div id="upload-placeholder" class="flex flex-col items-center justify-center pt-5 pb-6 {{ $journal->photo ? 'hidden' : '' }}">
                                    <svg class="h-8 w-8 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to
                                            change</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500">PNG, JPG or GIF (MAX. 2MB)</p>
                                </div>
                                <input
                                    type="file"
                                    name="photo"
                                    id="photo-input"
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
                class="w-full rounded-lg bg-green-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-green-300 sm:w-auto">
                Update Jurnal
            </button>
        </form>
    </div>

</x-app-layout>

<script>
    function previewImage(input) {
        const previewContainer = document.getElementById('image-preview-container');
        const preview = document.getElementById('image-preview');
        const placeholder = document.getElementById('upload-placeholder');
        const currentImageContainer = document.getElementById('current-image-container');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                previewContainer.classList.remove('hidden');
                placeholder.classList.add('hidden');
                if (currentImageContainer) {
                    currentImageContainer.classList.add('hidden');
                }
            }

            reader.readAsDataURL(input.files[0]);
        } else {
            previewContainer.classList.add('hidden');
            placeholder.classList.remove('hidden');
            if (currentImageContainer) {
                currentImageContainer.classList.remove('hidden');
            }
        }
    }
</script>
