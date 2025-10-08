<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<x-guest-layout>
    <div class="font-arial">

        <header>
            @include('public.components.navbar')
            <div
                class="align-items-center relative flex h-screen flex-col items-center justify-center bg-cover bg-fixed bg-no-repeat text-center font-semibold text-white">
                <!-- Video sebagai latar belakang -->
                <video class="absolute inset-0 w-full h-full object-cover" autoplay loop muted playsinline>
                    <source src="assets/images/videowebsite.mp4" type="video/mp4">
                </video>
                <!-- Overlay hitam transparan -->
                <div class="absolute inset-0 bg-black opacity-50"></div>

                <!-- Konten di atas background dan overlay -->
                <div class="relative mt-48 mx-11 sm:mx-30 lg:mx-40 h-full flex flex-col justify-center items-center text-white">
                    <div class="text-2xl sm:text-3xl lg:text-4xl font-bold">
                        <span class="typewriter block text-center max-w-[800px]">
                            Berita
                        </span>
                    </div>

                    <div class="pt-5">
                        <p class="text-[15px] sm:text-lg lg:text-xl text-[#bbbbbb] text-center">
                            Pusat Unggulan (CoE) Smart Tourism & Hospitality menyajikan informasi terbaru seputar program, 
                            penelitian, kerja sama, dan inovasi yang mendukung pengembangan pariwisata cerdas dan industri perhotelan
                        </p>
                    </div>
                </div>
            </div>
        </header>
        
        <br>
        <br>
        <br>

        <div class="text-center mb-20">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-800 leading-tight mb-4">
                    Berita <span class="text-[#F6A11F]">CoE</span><br class="hidden sm:block" />
                    Smart Tourism & Hospitality
                </h2>
                <!-- GARIS DEKORATIF -->
                <div class="flex justify-center">
                    <span class="inline-block w-16 h-[2px] bg-gray-300"></span>
                    <span class="inline-block w-6 h-[2px] bg-[#F6A11F] mx-1"></span>
                    <span class="inline-block w-16 h-[2px] bg-gray-300"></span>
                </div>
            </div>

        <div class="relative w-full max-w-4xl mx-auto mt-10">

            <!-- Carousel Container -->
            <div id="carousel" class="overflow-hidden relative">
                <div class="flex transition-transform duration-500 ease-in-out gap-4 items-stretch" id="carousel-inner">

                    <!-- Artikel Card 1 -->
                    <div class="flex-shrink-0 w-full sm:w-[48%] px-2">
                        <div class="relative w-full rounded-2xl overflow-hidden shadow-lg bg-white flex flex-col h-full">
                            <img src="{{ asset('assets/images/activity/artikel-2.png') }}" alt="artikel" class="w-full h-64 md:h-80 object-cover">
                            <div class="absolute top-4 left-4 bg-biru-sth text-white font-semibold text-sm w-32 h-8 flex items-center justify-center rounded-lg">Berita Terkini</div>
                            <div class="p-4 space-y-3 text-black flex-1">
                                <div class="flex items-center gap-2 bg-white bg-opacity-25 w-max px-3 py-1 rounded-lg">
                                    <img class="w-5 h-5" src="{{ asset('assets/icons/calendar.png') }}" alt="calendar">
                                    <p class="text-xs font-semibold">21, December 2023</p>
                                </div>
                                <div class="font-semibold text-base md:text-lg leading-snug">
                                    <p>Telkom University Luncurkan Teknologi</p>
                                    <p class="text-sm md:text-base text-gray-700 mt-1">Ciptakan Video Hasil AI Mengangkat Sejarah Kasepuhan Cirebon</p>
                                </div>
                            </div>
                            <div class="px-4 pb-4">
                                <a href="https://www.pikiran-rakyat.com/teknologi/pr-017501013/telkom-university-luncurkan-teknologi-lotus-ciptakan-video-hasil-ai-mengangkat-sejarah-kasepuhan-cirebon?page=all" target="_blank" class="block w-full text-center bg-biru-sth text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition">Selengkapnya</a>
                            </div>
                        </div>
                    </div>

                    <!-- Artikel Card 2 -->
                    <div class="flex-shrink-0 w-full sm:w-[48%] px-2">
                        <div class="relative w-full rounded-2xl overflow-hidden shadow-lg bg-white flex flex-col h-full">
                            <img src="{{ asset('assets/images/BROSUR.jpeg') }}" alt="artikel" class="w-full h-64 md:h-80 object-cover">
                            <div class="absolute top-4 left-4 bg-biru-sth text-white font-semibold text-sm w-32 h-8 flex items-center justify-center rounded-lg">Berita Terkini</div>
                            <div class="p-4 space-y-3 text-black flex-1">
                                <div class="flex items-center gap-2 bg-white bg-opacity-25 w-max px-3 py-1 rounded-lg">
                                    <img class="w-5 h-5" src="{{ asset('assets/icons/calendar.png') }}" alt="calendar">
                                    <p class="text-xs font-semibold">25-31 Agustus 2025</p>
                                </div>
                                <div class="font-semibold text-base md:text-lg leading-snug">
                                    <p>Graduation Exclusive Rate</p>
                                    <p class="text-sm md:text-base text-gray-700 mt-1">Graduation Exclusive Rate with Arsygo and Ibis Hotel. Start from Standard Room and Premiere Room.</p>
                                </div>
                            </div>
                            <div class="px-4 pb-4">
                                <a href="https://ibisbandungtransstudio.com/" target="_blank" class="block w-full text-center bg-biru-sth text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition">Selengkapnya</a>
                            </div>
                        </div>
                    </div>

                    <!-- Artikel Card 3 -->
                    <div class="flex-shrink-0 w-full sm:w-[48%] px-2">
                        <div class="relative w-full rounded-2xl overflow-hidden shadow-lg bg-white flex flex-col h-full">
                            <img src="{{ asset('assets/images/beautyclass.jpeg') }}" alt="artikel" class="w-full h-64 md:h-80 object-cover">
                            <div class="absolute top-4 left-4 bg-biru-sth text-white font-semibold text-sm w-32 h-8 flex items-center justify-center rounded-lg">Berita Terkini</div>
                            <div class="p-4 space-y-3 text-black flex-1">
                                <div class="flex items-center gap-2 bg-white bg-opacity-25 w-max px-3 py-1 rounded-lg">
                                    <img class="w-5 h-5" src="{{ asset('assets/icons/calendar.png') }}" alt="calendar">
                                    <p class="text-xs font-semibold">4 September 2025</p>
                                </div>
                                <div class="font-semibold text-base md:text-lg leading-snug">
                                    <p>Beauty Class - Flawless Makeup Look</p>
                                    <p class="text-sm md:text-base text-gray-700 mt-1">
                                        Make up tips Demo personal color analysis Product Wardah worth 100k At Bandung Techno Park, Telkom University<br>
                                    </p>
                                </div>
                            </div>
                            <div class="px-4 pb-4">
                                <a href="https://www.wardahbeauty.com/" target="_blank" class="block w-full text-center bg-biru-sth text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition">Selengkapnya</a>
                            </div>
                        </div>
                    </div>

                    <!-- Artikel Card 4 -->
                    <div class="flex-shrink-0 w-full sm:w-[48%] px-2">
                        <div class="relative w-full rounded-2xl overflow-hidden shadow-lg bg-white flex flex-col h-full">
                            <img src="{{ asset('assets/images/beautyclass.jpeg') }}" alt="artikel" class="w-full h-64 md:h-80 object-cover">
                            <div class="absolute top-4 left-4 bg-biru-sth text-white font-semibold text-sm w-32 h-8 flex items-center justify-center rounded-lg">Berita Terkini</div>
                            <div class="p-4 space-y-3 text-black flex-1">
                                <div class="flex items-center gap-2 bg-white bg-opacity-25 w-max px-3 py-1 rounded-lg">
                                    <img class="w-5 h-5" src="{{ asset('assets/icons/calendar.png') }}" alt="calendar">
                                    <p class="text-xs font-semibold">4 September 2025</p>
                                </div>
                                <div class="font-semibold text-base md:text-lg leading-snug">
                                    <p>Beauty Class - Flawless Makeup Look</p>
                                    <p class="text-sm md:text-base text-gray-700 mt-1">
                                        Make up tips Demo personal color analysis<br>
                                        Product Wardah worth 100k<br>
                                        Goodiebag for 3 best participants<br>
                                        E-Certificate<br>
                                        Snacks<br>
                                        At Bandung Techno Park, Telkom University<br>
                                        0822-1425-0203 (Yani N)
                                    </p>
                                </div>
                            </div>
                            <div class="px-4 pb-4">
                                <a href="https://ibisbandungtransstudio.com/" target="_blank" class="block w-full text-center bg-biru-sth text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition">Selengkapnya</a>
                            </div>
                        </div>
                    </div>

                    <!-- Artikel Card 5 -->
                    <div class="flex-shrink-0 w-full sm:w-[48%] px-2">
                        <div class="relative w-full rounded-2xl overflow-hidden shadow-lg bg-white flex flex-col h-full">
                            <img src="{{ asset('assets/images/beautyclass.jpeg') }}" alt="artikel" class="w-full h-64 md:h-80 object-cover">
                            <div class="absolute top-4 left-4 bg-biru-sth text-white font-semibold text-sm w-32 h-8 flex items-center justify-center rounded-lg">Berita Terkini</div>
                            <div class="p-4 space-y-3 text-black flex-1">
                                <div class="flex items-center gap-2 bg-white bg-opacity-25 w-max px-3 py-1 rounded-lg">
                                    <img class="w-5 h-5" src="{{ asset('assets/icons/calendar.png') }}" alt="calendar">
                                    <p class="text-xs font-semibold">4 September 2025</p>
                                </div>
                                <div class="font-semibold text-base md:text-lg leading-snug">
                                    <p>Beauty Class - Flawless Makeup Look</p>
                                    <p class="text-sm md:text-base text-gray-700 mt-1">
                                        Make up tips Demo personal color analysis<br>
                                        Product Wardah worth 100k<br>
                                        Goodiebag for 3 best participants<br>
                                        E-Certificate<br>
                                        Snacks<br>
                                        At Bandung Techno Park, Telkom University<br>
                                        0822-1425-0203 (Yani N)
                                    </p>
                                </div>
                            </div>
                            <div class="px-4 pb-4">
                                <a href="https://ibisbandungtransstudio.com/" target="_blank" class="block w-full text-center bg-biru-sth text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition">Selengkapnya</a>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Navigation Buttons -->
                <button id="prev" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-70 hover:bg-opacity-100 p-2 rounded-full shadow-lg">&#10094;</button>
                <button id="next" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-70 hover:bg-opacity-100 p-2 rounded-full shadow-lg">&#10095;</button>

            </div>
        </div>

        <br><br><br>

        <script>
        const carousel = document.getElementById('carousel-inner');
        const prevBtn = document.getElementById('prev');
        const nextBtn = document.getElementById('next');

        const totalItems = carousel.children.length;
        const itemsPerView = 2; // Karena 2 card terlihat per view
        let index = 0;

        function updateCarousel() {
            const maxIndex = Math.ceil(totalItems / itemsPerView) - 1;
            const offsetIndex = Math.min(index, maxIndex);
            const offset = -offsetIndex * 100;
            carousel.style.transform = `translateX(${offset}%)`;
        }

        prevBtn.addEventListener('click', () => {
            const maxIndex = Math.ceil(totalItems / itemsPerView) - 1;
            index = (index - 1 + (maxIndex + 1)) % (maxIndex + 1);
            updateCarousel();
        });

        nextBtn.addEventListener('click', () => {
            const maxIndex = Math.ceil(totalItems / itemsPerView) - 1;
            index = (index + 1) % (maxIndex + 1);
            updateCarousel();
        });
        </script>

    </div>
</x-guest-layout>
</body>
</html>
