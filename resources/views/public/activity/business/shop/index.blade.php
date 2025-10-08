<x-guest-layout>
    @push("styles")
  <link rel="stylesheet" href="{{ asset("assets/css/slide.css") }}" />
@endpush

<div>
        {{-- ==== HEADER ==== --}}
        <header>
            @include('public.components.navbar')
            <div
                class="align-items-center relative flex h-screen flex-col items-center justify-center bg-cover bg-fixed bg-no-repeat text-center font-semibold text-white">
                <!-- Video sebagai latar belakang -->
                <video class="absolute inset-0 w-full h-full object-cover" autoplay loop muted playsinline>
                    <source src="assets/images/home/videoo.mp4" type="video/mp4">
                </video>
                <!-- Overlay hitam transparan -->
                <div class="absolute inset-0 bg-black opacity-50"></div>

                <!-- Konten di atas background dan overlay -->
            <div class="relative mt-48 mx-11 sm:mx-30 lg:mx-40 h-full flex flex-col justify-center items-center text-white">
                <div class="text-2xl sm:text-3xl lg:text-4xl font-bold">
                    <span class="typewriter block text-center max-w-[800px]">
                        Kedai CoE
                    </span>
                </div>

                <div class="pt-5">
                    <p class="text-[15px] sm:text-lg lg:text-xl text-[#bbbbbb] text-center">
                        Kedai CoE merupakan fasilitas penunjang yang dihadirkan oleh Center of Excellence (CoE) Smart Tourism & Hospitality sebagai ruang interaksi dan kolaborasi.
                        Dengan suasana yang nyaman dan pelayanan profesional, 
                        Kedai CoE menjadi tempat yang ideal untuk menikmati sajian minuman dan makanan berkualitas, 
                        sekaligus mendukung kegiatan diskusi, pertemuan, maupun kerja kreatif
                    </p>
                </div>
            </div>
            </div>
        </header>

        <main class="flex flex-col items-center pt-[120px] bg-white">
            <div class="relative w-11/12 md:w-5/6">

                <!-- Header Logo -->
                <div class="mb-8 flex items-center justify-center gap-4">
                    <img src="{{ asset('assets/images/activity/kedai.png') }}" alt="Logo Kedai CoE" class="h-16">
                    <h1 class="text-3xl font-bold">Kedai CoE</h1>
                </div>

                @foreach ($shops->sortByDesc('created_at') as $shop)
                    <!-- Card Artikel Kedai -->
                    <article 
                        wire:key="shop-{{ $shop->id }}" 
                        class="mb-6 overflow-hidden rounded-lg border border-gray-200 shadow-md hover:shadow-lg transition-shadow duration-300"
                    >
                        <div class="flex flex-col md:flex-row">

                            <!-- Bagian Gambar -->
                            <div class="md:w-1/3 flex flex-col">
                                <div class="h-64 md:h-full">
                                    <img 
                                        src="{{ $shop->first_photo->photo_url }}" 
                                        alt="{{ $shop->title }}" 
                                        class="h-full w-full object-cover"
                                        data-shop-id="{{ $shop->id }}"
                                    >
                                </div>
                                <!-- Thumbnail -->
                                <div class="flex h-20 gap-1 overflow-x-auto overflow-y-hidden py-1 scrollbar-none bg-gray-50 px-1">
                                    @foreach ($shop->photos as $photo)
                                        <img 
                                            src="{{ $photo->photo_url }}" 
                                            alt="{{ $shop->title }}" 
                                            class="thumbnail h-full w-20 cursor-pointer object-cover transition duration-300 hover:scale-105"
                                            data-shop-id="{{ $shop->id }}"
                                        >
                                    @endforeach
                                </div>
                            </div>

                            <!-- Bagian Konten -->
                            <div class="flex flex-col justify-between p-5 md:w-2/3">
                                <header>
                                    <!-- Judul -->
                                    <h2 class="text-2xl font-semibold text-gray-800 hover:text-blue-700 transition-colors duration-200">
                                        {{ $shop->title }}
                                    </h2>

                                    <!-- Kontak -->
                                    <div class="mt-3 flex flex-wrap items-center gap-4 text-sm text-gray-600">
                                        <!-- Instagram -->
                                        <div class="flex items-center">
                                            <svg class="h-5 w-5 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                      d="M3 8a5 5 0 015-5h8a5 5 0 015 5v8a5 5 0 01-5 5H8a5 5 0 01-5-5V8zm5-3a3 3 0 00-3 3v8a3 3 0 003 3h8a3 3 0 003-3V8a3 3 0 00-3-3H8zm7.597 2.214a1 1 0 011-1h.01a1 1 0 110 2h-.01a1 1 0 01-1-1zM12 9a3 3 0 100 6 3 3 0 000-6zm-5 3a5 5 0 1110 0 5 5 0 01-10 0z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                            <span class="font-medium">{{ $shop->instagram }}</span>
                                        </div>

                                        <!-- WhatsApp -->
                                        <div class="flex items-center">
                                            <svg class="h-5 w-5 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M7.978 4a2.553 2.553 0 00-1.926.877C4.233 6.7 3.699 8.751 4.153 10.814c.44 1.995 1.778 3.893 3.456 5.572 1.68 1.679 3.577 3.018 5.57 3.459 2.062.456 4.115-.073 5.94-1.885a2.556 2.556 0 000-3.861l-1.21-1.21a2.689 2.689 0 00-3.802 0l-.617.618a.806.806 0 01-1.14 0l-1.854-1.855a.807.807 0 010-1.14l.618-.62a2.692 2.692 0 000-3.803l-1.21-1.211A2.555 2.555 0 007.978 4z"
                                                />
                                            </svg>
                                            <span class="font-medium">{{ $shop->whatsapp }}</span>
                                        </div>
                                    </div>
                                </header>

                                <!-- Deskripsi -->
                                <p class="mt-4 text-gray-700 text-justify line-clamp-4">
                                    {{ $shop->description }}
                                </p>

                                <!-- Tombol Selengkapnya -->
                                <div class="mt-4">
                                    <a href="#" 
                                      class="inline-block rounded-md bg-blue-50 px-4 py-2 text-sm font-medium text-blue-700 hover:bg-blue-100 transition">
                                        Selengkapnya
                                    </a>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            @include('layouts.pagination')
        </main>


  <!-- JavaScript -->
  <script src="{{ asset("assets/js/navbar.js") }}"></script>
  <script src="{{ asset("assets/js/imageSlides.js") }}"></script>
</div>

</x-guest-layout>
