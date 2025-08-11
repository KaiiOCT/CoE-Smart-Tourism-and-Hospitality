<x-app-layout>
    <div>
        <div class="flex justify-between">
            <div class="">
                <h1 class="text-2xl font-semibold">Edit Berita</h1>
                <p class="text-sm font-medium">Isi Konten untuk edit berita :</p>
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

        <!-- Update Form -->
        <form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data" class="mt-5">
            @csrf
            @method('PUT')
            <div class="mt-3 flex flex-wrap md:flex-nowrap md:space-x-10">
                <div class="basis-full md:basis-7/12">
                    <div class="mb-6">
                        <label for="title" class="mb-2 block text-sm font-medium text-gray-900">
                            Judul Berita
                        </label>
                        <input type="text" name="title" id="title" value="{{ old('title', $news->title) }}"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" />
                        @error('title')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="description" class="mb-2 block text-sm font-medium text-gray-900">
                            Deskripsi Berita
                        </label>
                        <textarea name="description" id="description" rows="4"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500">{{ old('description', $news->description) }}</textarea>
                        @error('description')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="link" class="mb-2 block text-sm font-medium text-gray-900">
                            Link Berita
                        </label>
                        <input type="url" name="link" id="link" value="{{ old('link', $news->link) }}"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" />
                        @error('link')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="date" class="mb-2 block text-sm font-medium text-gray-900">
                            Tanggal Berita
                        </label>
                        <input type="date" name="date" id="date" value="{{ old('date', $news->date) }}"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 lg:w-2/4" />
                        @error('date')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="category_id" class="mb-2 block text-sm font-medium text-gray-900">
                            Kategori
                        </label>
                        <select name="category_id" id="category_id"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 lg:w-2/4">
                            <option value="">Pilih Kategori Berita</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $news->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="mb-2 block text-sm font-medium text-gray-900">
                            Berita Utama
                        </label>
                        <div class="flex">
                            <div class="me-4 flex items-center">
                                <input type="radio" name="is_main" id="is_main_no" value="0"
                                    {{ old('is_main', $news->is_main) == '0' ? 'checked' : '' }}
                                    class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500" />
                                <label for="is_main_no" class="ms-2 text-sm font-medium text-gray-900">
                                    Tidak
                                </label>
                            </div>
                            <div class="me-4 flex items-center">
                                <input type="radio" name="is_main" id="is_main_yes" value="1"
                                    {{ old('is_main', $news->is_main) == '1' ? 'checked' : '' }}
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

                <div class="basis-full md:basis-5/12">
                    <div class="mb-6">
                        <label class="mb-2 block text-sm font-medium text-gray-900">
                            Dokumentasi Berita
                        </label>
                        <div class="flex w-full items-center justify-center">
                            <label for="photo"
                                class="relative flex h-64 w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 hover:bg-gray-100">
                                <img src="{{ asset('storage/' . $news->photo) }}" alt="{{ $news->title }}"
                                    class="absolute h-full w-full rounded-lg object-cover" />
                                <div class="z-10 flex h-full w-full flex-col items-center justify-center rounded-lg bg-gray-700/25 pb-6 pt-5 text-gray-100">
                                    <svg class="mb-4 h-8 w-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm"><span class="font-semibold">Click to change image</span></p>
                                    <p class="text-xs">SVG, PNG, JPG or GIF (MAX. 2MB)</p>
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
                class="rounded-lg bg-green-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-green-300">
                Update Berita
            </button>
        </form>

        <!-- Delete Form - Separate from Update Form -->
        <form action="{{ route('admin.news.destroy', $news) }}" method="POST" class="mt-4"
            onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="rounded-lg bg-red-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-300">
                Hapus Berita
            </button>
        </form>
    </div>
</x-app-layout>