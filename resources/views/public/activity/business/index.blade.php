<x-guest-layout>
    <div>
        {{-- ==== HEADER ==== --}}
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
                        Bisnis
                    </span>
                </div>

                <div class="pt-5">
                    <p class="text-[15px] sm:text-lg lg:text-xl text-[#bbbbbb] text-center">
                    Inovasi adalah kunci keberlanjutan bisnis. Dengan memadukan riset, teknologi, dan kreativitas, 
                    kami menghadirkan solusi yang relevan, bernilai tambah, dan berdampak positif bagi pelanggan 
                    serta pemangku kepentingan
                    </p>
                </div>
            </div>
            </div>
        </header>

        <main class="mt-36 flex flex-col items-center">
            {{-- Container 1: Kegiatan Bisnis --}}
            <section class="mb-16 w-10/12 max-w-6xl rounded-[30px] bg-white p-10 border border-gray-400 shadow-xl transition-all duration-300 transform hover:scale-[1.01] hover:shadow-2xl">
                <div class="text-center mb-10">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="mx-auto mb-6 h-20 w-20 object-contain" />
                    <h1 class="text-2xl font-bold text-gray-800 md:text-4xl drop-shadow-md">
                        Kegiatan Bisnis CoE Smart Tourism & Hospitality
                    </h1>
                </div>
                <div class="text-justify text-base text-gray-700 md:text-lg leading-relaxed break-words">
                    <p class="mb-5">
                        CoE STH menjalankan dua inisiatif bisnis utama yang mendukung industri pariwisata secara berkelanjutan. <strong>Rumah Jurnal</strong> merupakan platform publikasi ilmiah yang mendorong diseminasi riset dan pengembangan kebijakan berbasis pengetahuan. Inisiatif ini memperkuat kontribusi akademik terhadap sektor pariwisata.
                    </p>
                    <p>
                        Di sisi lain, <strong>Kedai CoE</strong> menjadi ruang interaktif yang mengangkat produk lokal dan budaya Indonesia, sekaligus mendukung UMKM dan pelestarian lingkungan. Dengan menggabungkan aspek bisnis, budaya, dan pemberdayaan lokal, Kedai CoE menciptakan ekosistem ekonomi kreatif yang inklusif dan berdampak positif.
                    </p>
                </div>
            </section>

            {{-- Container 2: Hasil Bisnis --}}
            <section class="mb-16 w-10/12 max-w-6xl rounded-[30px] bg-white p-10 border border-gray-400 shadow-xl transition-all duration-300 transform hover:scale-[1.01] hover:shadow-2xl">
                <div class="text-center mb-10">
                    <img src="{{ asset('assets/icons/cooperation.png') }}" alt="Icon" class="mx-auto mb-6 h-20 w-20 object-contain" />
                    <h2 class="text-2xl font-bold text-gray-800 md:text-4xl drop-shadow-md">
                        Hasil Bisnis dan Dampaknya
                    </h2>
                </div>
                <p class="text-justify text-base text-gray-700 md:text-lg leading-relaxed break-words">
                    Setiap inisiatif bisnis CoE STH dirancang untuk mendukung pertumbuhan pariwisata sekaligus memberdayakan masyarakat lokal. Dengan menggabungkan riset, budaya, dan teknologi, CoE menciptakan ruang inovatif yang memberi manfaat ekonomi dan sosial secara berkelanjutan.
                </p>
            </section>

            {{-- Kartu Pelatihan Jurnal & Kedai CoE berdampingan --}}
            <div class="mb-20 flex w-full flex-wrap justify-center gap-8 px-4 md:flex-nowrap md:gap-10">
                {{-- Card: Pelatihan Jurnal --}}
                <div class="group w-full max-w-md overflow-hidden rounded-2xl border border-gray-300 bg-white shadow-xl transition duration-300 hover:scale-[1.02] hover:shadow-2xl">
                    <div class="relative h-52 w-full">
                        <img src="{{ asset('assets/images/activity/JurnalImg.png') }}" alt="Pelatihan Jurnal" class="h-full w-full object-cover" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                    </div>
                    <div class="px-6 py-5 text-center">
                        <h5 class="mb-2 text-xl font-bold text-gray-800">Pelatihan Jurnal</h5>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            Rumah Jurnal membantu publikasi artikel ilmiah di bidang pariwisata, mendukung akademisi dan praktisi untuk berbagi pengetahuan strategis.
                        </p>
                    </div>
                    <div class="border-t border-gray-200 px-6 py-4 text-center">
                        <a href="{{ route('training.index') }}" class="inline-block rounded-full bg-blue-600 px-6 py-2 text-sm font-medium text-white shadow-md transition duration-300 hover:bg-blue-700 hover:shadow-lg">
                            Selengkapnya
                        </a>
                    </div>
                </div>

                {{-- Card: Kedai CoE --}}
                <div class="group w-full max-w-md overflow-hidden rounded-2xl border border-gray-300 bg-white shadow-xl transition duration-300 hover:scale-[1.02] hover:shadow-2xl">
                    <div class="relative h-52 w-full">
                        <img src="{{ asset('assets/images/activity/imgKedai.png') }}" alt="Kedai CoE" class="h-full w-full object-cover" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                    </div>
                    <div class="px-6 py-5 text-center">
                        <h5 class="mb-2 text-xl font-bold text-gray-800">Kedai CoE</h5>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            Kedai CoE adalah tempat interaktif yang menyajikan kuliner lokal, produk UMKM, dan mendukung ekonomi kreatif berbasis budaya.
                        </p>
                    </div>
                    <div class="border-t border-gray-200 px-6 py-4 text-center">
                        <a href="{{ route('shop.index') }}" class="inline-block rounded-full bg-blue-600 px-6 py-2 text-sm font-medium text-white shadow-md transition duration-300 hover:bg-blue-700 hover:shadow-lg">
                            Selengkapnya
                        </a>
                    </div>
                </div>
            </div>

        </main>

        <script src="{{ asset('assets/js/navbar.js') }}"></script>
    </div>
</x-guest-layout>
