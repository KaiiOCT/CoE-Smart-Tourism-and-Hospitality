<x-app-layout>
    <div>
        <div class="flex justify-between">
            <div>
                <h1 class="text-2xl font-semibold">Tambah Berita (STH News)</h1>
                <p class="text-sm font-medium text-gray-600">Tulis berita secara manual atau unggah file Word/PDF untuk konversi otomatis:</p>
            </div>
            <a href="{{ route('admin.news.index') }}" class="hidden font-medium text-black md:flex md:items-center">
                <svg class="inline h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="20" y1="12" x2="5" y2="12" />
                    <polyline points="10 18 5 12 10 6" />
                </svg>
                Kembali
            </a>
        </div>

        <!-- Alert Error Validasi Global -->
        @if ($errors->any())
            <div class="mt-4 rounded-lg bg-red-100 p-4 text-sm text-red-700">
                <p class="font-bold">Gagal menambahkan berita:</p>
                <ul class="mt-1 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="mt-5">
            @csrf

            <!-- SECTION 1: AUTO CONVERT DARI DOKUMEN (OPSIONAL) -->
            <div class="mb-8 rounded-xl border border-blue-200 bg-blue-50/50 p-5 shadow-sm">
                <div class="flex items-center space-x-2">
                    <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                    </svg>
                    <h2 class="text-lg font-semibold text-blue-900">Opsi 1: Import dari Dokumen (Word / PDF)</h2>
                </div>
                <p class="mt-1 text-xs text-blue-700">
                    Jika kamu mengunggah dokumen Word (.docx) atau PDF (.pdf), sistem akan otomatis membaca dan mengonversi teks dokumen menjadi isi berita.
                </p>
                <div class="mt-4">
                    <label for="document_file" class="mb-2 block text-sm font-medium text-gray-900">
                        Pilih File Dokumen (.docx / .pdf)
                    </label>
                    <input type="file" name="document_file" id="document_file" accept=".docx,.pdf"
                        class="block w-full cursor-pointer rounded-lg border border-gray-300 bg-white text-sm text-gray-900 focus:outline-none p-2" />
                    @error('document_file')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- SECTION 2: FORM ISI BERITA MANUAL -->
            <div class="mt-3 flex flex-wrap md:flex-nowrap md:space-x-10">
                <div class="basis-full md:basis-7/12">
                    
                    <!-- Judul Berita -->
                    <div class="mb-6">
                        <label for="title" class="mb-2 block text-sm font-medium text-gray-900">
                            Judul Berita <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="Masukkan judul berita..."
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" />
                        @error('title')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tipe Berita -->
                    <div class="mb-6">
                        <label class="mb-2 block text-sm font-medium text-gray-900">
                            Tipe Berita <span class="text-red-500">*</span>
                        </label>
                        <div class="flex">
                            <div class="me-4 flex items-center">
                                <input type="radio" name="type" id="type_internal" value="internal"
                                    {{ old('type', 'internal') == 'internal' ? 'checked' : '' }}
                                    class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500" />
                                <label for="type_internal" class="ms-2 text-sm font-medium text-gray-900">
                                    STH News (Internal Website)
                                </label>
                            </div>
                            <div class="me-4 flex items-center">
                                <input type="radio" name="type" id="type_external" value="external"
                                    {{ old('type') == 'external' ? 'checked' : '' }}
                                    class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500" />
                                <label for="type_external" class="ms-2 text-sm font-medium text-gray-900">
                                    Berita Eksternal (Link URL)
                                </label>
                            </div>
                        </div>
                        @error('type')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Link Berita (Hanya jika Tipe Eksternal) -->
                    <div class="mb-6" id="link-container">
                        <label for="link" class="mb-2 block text-sm font-medium text-gray-900">
                            Link Berita Eksternal (URL)
                        </label>
                        <input type="url" name="link" id="link" value="{{ old('link') }}" placeholder="https://..."
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" />
                        @error('link')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Deskripsi Singkat -->
                    <div class="mb-6">
                        <label for="description" class="mb-2 block text-sm font-medium text-gray-900">
                            Deskripsi Singkat Berita <span class="text-red-500">*</span>
                        </label>
                        <textarea name="description" id="description" rows="3" placeholder="Ringkasan singkat berita untuk kartu tampilan..."
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Rich Text Editor: Isi Konten Berita -->
                    <div class="mb-6" id="content-container">
                        <label for="content" class="mb-2 block text-sm font-medium text-gray-900">
                            Isi Konten Berita Lengkap (Rich Text)
                        </label>
                        <textarea name="content" id="editor" rows="10"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500">{{ old('content') }}</textarea>
                        @error('content')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tanggal Berita -->
                    <div class="mb-6">
                        <label for="date" class="mb-2 block text-sm font-medium text-gray-900">
                            Tanggal Berita <span class="text-red-500">*</span>
                        </label>
                        <input type="date" name="date" id="date" value="{{ old('date', date('Y-m-d')) }}"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 lg:w-2/4" />
                        @error('date')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Kategori Berita -->
                    <div class="mb-6">
                        <label for="category_id" class="mb-2 block text-sm font-medium text-gray-900">
                            Kategori <span class="text-red-500">*</span>
                        </label>
                        <select name="category_id" id="category_id"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 lg:w-2/4">
                            <option value="">Pilih Kategori Berita</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Pilihan Berita Utama -->
                    <div class="mb-6">
                        <label class="mb-2 block text-sm font-medium text-gray-900">
                            Berita Utama (Hero Carousel)
                        </label>
                        <div class="flex">
                            <div class="me-4 flex items-center">
                                <input type="radio" name="is_main" id="is_main_no" value="0"
                                    {{ old('is_main', '0') == '0' ? 'checked' : '' }}
                                    class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500" />
                                <label for="is_main_no" class="ms-2 text-sm font-medium text-gray-900">
                                    Tidak
                                </label>
                            </div>
                            <div class="me-4 flex items-center">
                                <input type="radio" name="is_main" id="is_main_yes" value="1"
                                    {{ old('is_main') == '1' ? 'checked' : '' }}
                                    class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500" />
                                <label for="is_main_yes" class="ms-2 text-sm font-medium text-gray-900">
                                    Ya
                                </label>
                            </div>
                        </div>
                        @error('is_main')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Dokumentasi Foto Sampul -->
                <div class="basis-full md:basis-5/12">
                    <div class="mb-6">
                        <label class="mb-2 block text-sm font-medium text-gray-900">
                            Foto Sampul / Thumbnail Berita <span class="text-red-500">*</span>
                        </label>
                        <div class="flex w-full items-center justify-center">
                            <label for="photo"
                                class="flex h-64 w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 hover:bg-gray-100">
                                <div class="flex flex-col items-center justify-center pb-6 pt-5">
                                    <svg class="mb-4 h-8 w-8 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload photo</span></p>
                                    <p class="text-xs text-gray-500">SVG, PNG, JPG atau GIF (MAX. 2MB)</p>
                                </div>
                                <input type="file" name="photo" id="photo" class="hidden" accept="image/*" />
                            </label>
                        </div>
                        @error('photo')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <button type="submit"
                class="w-full rounded-lg bg-blue-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 sm:w-auto">
                Simpan & Publikasikan Berita
            </button>
        </form>
    </div>

    <!-- Script CKEditor 5 CDN -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Inisialisasi CKEditor 5 pada textarea #editor
            ClassicEditor
                .create(document.querySelector('#editor'), {
                    toolbar: [
                        'heading', '|', 
                        'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|',
                        'insertTable', 'undo', 'redo'
                    ]
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
</x-app-layout>