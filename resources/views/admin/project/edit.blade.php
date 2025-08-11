<x-app-layout>
    <div>
        <div class="flex justify-between">
            <div class="">
                <h1 class="text-2xl font-semibold">Edit Project Terkini</h1>
                <p class="text-sm font-medium">Isi Konten untuk mengedit project :</p>
            </div>
            <a href="{{ route('admin.index') }}" 
               class="hidden font-medium text-black md:flex md:items-center">
                <svg class="inline h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="20" y1="12" x2="5" y2="12" />
                    <polyline points="10 18 5 12 10 6" />
                </svg>
                Kembali
            </a>
        </div>

        <!-- Update Form -->
        <form action="{{ route('admin.project.update', $project) }}" method="POST" class="mt-5">
            @csrf
            @method('PUT')
            <div class="mt-3 flex flex-wrap md:flex-nowrap md:space-x-10">
                <div class="basis-full md:basis-10/12">
                    <div class="mb-6">
                        <label for="name" class="mb-2 block text-sm font-medium text-gray-900">
                            Nama Project
                        </label>
                        <input type="text" name="name" id="name" value="{{ old('name', $project->name) }}"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" />
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="description" class="mb-2 block text-sm font-medium text-gray-900">
                            Deskripsi Project
                        </label>
                        <textarea name="description" id="description" rows="4"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500">{{ old('description', $project->description) }}</textarea>
                        @error('description')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="yt_link" class="mb-2 block text-sm font-medium text-gray-900">
                            Link Youtube Project
                        </label>
                        <input type="url" name="yt_link" id="yt_link" value="{{ old('yt_link', $project->yt_link) }}"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" />
                        @error('yt_link')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="flex justify-between">
                <button type="submit"
                    class="rounded-lg bg-green-600 px-5 py-2 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-green-300">
                    Update Project
                </button>
            </div>
        </form>

        <!-- Delete Form - Separate from Update Form -->
        <form action="{{ route('admin.project.destroy', $project) }}" method="POST" class="mt-4">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus project ini?')"
                class="rounded-lg bg-red-600 px-5 py-2 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-300">
                Hapus Project
            </button>
        </form>
    </div>
</x-app-layout>