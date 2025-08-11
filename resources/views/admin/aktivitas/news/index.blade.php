<x-app-layout>
    <div>
        <div class="flex justify-between">
            <div class="">
                <h1 class="text-2xl font-semibold">Managemen Konten Berita</h1>
                <p class="text-sm font-medium">Pilih Konten untuk menedit :</p>
            </div>
            <a href="{{ route('admin.activity') }}" class="hidden font-medium text-black md:flex md:items-center">
                <svg class="inline h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="20" y1="12" x2="5" y2="12" />
                    <polyline points="10 18 5 12 10 6" />
                </svg>
                Kembali
            </a>
        </div>
        <div class="mt-3 flex justify-between">
            <a href="{{ route('admin.news.create') }}"
                class="rounded-xl bg-yellow-400 px-5 py-1.5 text-base font-medium hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300">
                Tambah Berita
            </a>
        </div>

        @if(session('success'))
            <div class="mt-4 rounded-lg bg-green-100 p-4 text-green-700">
                {{ session('success') }}
            </div>
        @endif

        <div class="mt-5">
            @if(count($news) > 0)
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                    @foreach($news as $article)
                        <div class="overflow-hidden rounded-lg border bg-white p-4 shadow-sm">
                            <div class="relative h-48 w-full overflow-hidden rounded-lg">
                                <img src="{{ asset('storage/' . $article->photo) }}" alt="{{ $article->title }}"
                                    class="h-full w-full object-cover">
                            </div>
                            <div class="mt-4">
                                <h3 class="text-lg font-semibold text-gray-900">{{ $article->title }}</h3>
                                <p class="mt-2 text-sm text-gray-600">{{ date('d F Y', strtotime($article->date)) }}</p>
                                <p class="text-sm text-gray-600">{{ $article->category->name }}</p>
                                <div class="mt-4 flex justify-end space-x-2">
                                    <form action="{{ route('admin.news.destroy', $article) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="rounded-full border border-red-500 px-8 py-1.5 text-center text-sm font-medium text-red-500 hover:bg-red-500 hover:text-white focus:outline-none focus:ring-4 focus:ring-red-300">
                                            Hapus
                                        </button>
                                    </form>
                                    <a href="{{ route('admin.news.edit', $article) }}"
                                        class="rounded-full border border-green-500 px-8 py-1.5 text-center text-sm font-medium text-green-500 hover:bg-green-500 hover:text-white focus:outline-none focus:ring-4 focus:ring-green-300">
                                        Edit
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="mt-4 rounded-lg bg-gray-100 p-8 text-center">
                    <p class="text-gray-600">Belum ada berita yang ditambahkan</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>