<x-guest-layout>
    <!-- Style Khusus: Navbar Permanen Putih + Teks Gelap -->
    <style>
        header nav, 
        nav.fixed, 
        nav {
            background-color: #ffffff !important;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06) !important;
            transition: none !important;
        }

        header nav a, 
        header nav span, 
        header nav button, 
        header nav p,
        header nav div:not(.bg-orange-500) {
            color: #1f2937 !important; /* Teks Gelap */
        }

        header nav svg {
            stroke: #1f2937 !important;
            color: #1f2937 !important;
        }
    </style>

    <div>
        <header>
            @include('public.components.navbar')
            
            <!-- Header Banner STH News (Menggunakan Inline Style Jarak Atas Pasti) -->
            <div class="w-full bg-[#2593CF]" style="padding-top: 100px; padding-bottom: 60px;">
                <div class="flex flex-col justify-center px-6 text-white md:px-20 max-w-6xl mx-auto">
                    <!-- Badge Kategori & Tanggal Berita -->
                    <div class="flex items-center space-x-3 mb-4">
                        <span class="rounded-lg bg-orange-500 px-3 py-1.5 text-xs font-semibold uppercase tracking-wider shadow-md">
                            {{ $news->category->name }}
                        </span>
                        <span class="text-sm md:text-base text-white/95 font-medium drop-shadow-sm">
                            {{ date("d F Y", strtotime($news->date)) }}
                        </span>
                    </div>
                    
                    <!-- Judul Berita Utama -->
                    <h1 class="text-2xl font-bold leading-relaxed md:text-3xl lg:text-4xl drop-shadow-md">
                        {{ $news->title }}
                    </h1>
                </div>
            </div>
        </header>

        <main class="mx-auto max-w-4xl px-4 py-10 md:py-14">
            <!-- Tombol Kembali -->
            <a href="{{ route('news.index') }}" class="inline-flex items-center text-sm font-semibold text-[#2593CF] hover:underline mb-8">
                <svg class="mr-2 h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="19" y1="12" x2="5" y2="12" />
                    <polyline points="12 19 5 12 12 5" />
                </svg>
                Kembali ke Daftar Berita
            </a>

            <!-- Ringkasan / Deskripsi Singkat -->
            @if($news->description)
                <div class="mb-8 rounded-xl bg-gray-50 border-l-4 border-[#2593CF] p-4 text-base italic text-gray-700 md:text-lg">
                    "{{ $news->description }}"
                </div>
            @endif

            <!-- Isi Konten Berita (Rich Text HTML) -->
            <div class="prose prose-lg max-w-none text-gray-800 leading-relaxed space-y-4">
                {!! $news->content !!}
            </div>

            <!-- Rekomendasi Berita Lainnya -->
            @if(count($recentNewses) > 0)
                <hr class="my-12 border-gray-200" />
                <h3 class="text-xl font-bold text-gray-900 mb-6">Berita Lainnya</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($recentNewses as $item)
                        <div class="overflow-hidden rounded-2xl border bg-white shadow-sm hover:shadow-md transition">
                            <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->title }}" class="h-36 w-full object-cover" />
                            <div class="p-4">
                                <span class="text-xs font-semibold text-[#2593CF]">{{ $item->category->name }}</span>
                                <h4 class="line-clamp-2 text-sm font-bold text-gray-900 mt-1">
                                    <a href="{{ ($item->type === 'internal' || !empty($item->slug)) ? route('sthnews.show', $item->slug) : $item->link }}" class="hover:underline">
                                        {{ $item->title }}
                                    </a>
                                </h4>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </main>
    </div>
</x-guest-layout>