<x-guest-layout>
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
                        Center of Excellence Smart Tourism & Hospitality
                    </span>
                </div>

                <div class="pt-5">
                    <p class="text-[15px] sm:text-lg lg:text-xl text-[#bbbbbb] text-center">
                        Center of Excellence Smart Tourism and Hospitality
                        merupakan pusat unggulan di bidang pariwisata dan hospitality
                        yang berfokus pada riset, inovasi, bisnis, dan pengabdian kepada masyarakat.
                    </p>
                </div>
            </div>
            </div>
        </header>

        {{-- ==== Main ==== --}}
        <main>
            {{-- Ketua RA smart --}}
            <section class="flex min-h-screen flex-col items-center bg-white px-3 max-md:pt-20 md:py-20">
                {{-- chairman --}}
                <div class="mb-5 flex w-11/12 flex-col md:w-5/6">
                    <h1 class="mb-5 text-base font-semibold md:hidden">
                        Ketua RA Smart Tourism & Hospitality
                    </h1>
                    <div class="flex max-md:flex-wrap-reverse md:items-center">
                        <div class="h-full w-full md:w-3/5">
                            <h1 class="text-base font-semibold max-md:hidden md:text-4xl">
                                Ketua
                                <br />
                                CoE Smart Tourism & Hospitality
                            </h1>
                            <p class="b-3 text-2xl sm:text-[26px] lg:text-3xl font-semibold lg:font-normal pt-3">
                                Dr. Ersy Ervina, S.Sos., MM. Par
                            </p>
                            <p class="mb-8 mt-4 text-justify md:text-lg">
                                Center of Excellence Smart Tourism and Hospitality (STH)
                                merupakan pusat unggulan di bidang pariwisata dan hospitality
                                yang berfokus pada riset, inovasi, bisnis, dan pengabdian kepada masyarakat.
                                Center of Excellence STH menciptakan produk dan layanan yang berdaya saing.
                                Melalui kolaborasi lintas sektor dan pengembangan kompetensi sumber daya manusia,
                                Center of Excellence STH siap mendukung kemajuan pariwisata Indonesia yang berkelanjutan.
                            </p>
                        </div>
                        <div class="relative mx-auto ">
                            <img src="assets/images/home/Bu Ersy 1.png" alt="img"
                                class="max-md:relative max-md:z-10 max-md:h-full" />
                        </div>
                    </div>
                </div>

                {{-- program --}}
                <div class="py-10 flex">
                    <div class="mx-auto grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-x-20 gap-y-10 lg:pt-20">
                        <!-- Riset dan Publikasi -->
                        <div
                            class="relative group flex justify-center hover:scale-110 transition duration-500 cursor-pointer">
                            <img src="{{ asset('assets/images/home/Riset.png') }}" alt="Riset dan Publikasi"
                                class="w-full sm:w-[400px] lg:w-[512px] h-auto object-cover shadow-2xl">
                            <div
                                class="absolute top-[-15px] left-1/2 transform -translate-x-1/2 w-52 h-[33.41px] rounded-md bg-[#F6A11F] text-white italic font-semibold flex justify-center items-center shadow-2xl">
                                Riset dan Publikasi
                            </div>
                            <a href="{{ route('research.index') }}" class="absolute inset-0"></a>
                        </div>

                        <!-- Inovasi -->
                        <div
                            class="relative group flex justify-center hover:scale-110 transition duration-500 cursor-pointer">
                            <img src="{{ asset('assets/images/inovasiii.jpeg') }}" alt="Inovasi"
                                class="w-full sm:w-[400px] lg:w-[512px] h-auto object-cover shadow-2xl">
                            <div
                                class="absolute top-[-15px] left-1/2 transform -translate-x-1/2 w-52 h-[33.41px] rounded-md bg-[#2593CF] text-white italic font-semibold flex justify-center items-center shadow-2xl">
                                Inovasi
                            </div>
                            <a href="{{ route('innovation.index') }}" class="absolute inset-0"></a>
                        </div>
                        <!-- Bisnis -->
                        <div
                            class="relative group flex justify-center hover:scale-110 transition duration-500 cursor-pointer">
                            <img src="{{ asset('assets/images/home/bisnis.png') }}" alt="Bisnis"
                                class="w-full sm:w-[400px] lg:w-[512px] h-auto object-cover shadow-2xl">
                            <div
                                class="absolute top-[-15px] left-1/2 transform -translate-x-1/2 w-52 h-[33.41px] rounded-md bg-[#E20A91] text-white italic font-semibold flex justify-center items-center shadow-2xl">
                                Bisnis
                            </div>
                            <a href="{{ route('business.index') }}" class="absolute inset-0"></a>
                        </div>
                        <!-- Pengabdian Masyarakat -->
                        <div
                            class="relative group flex justify-center hover:scale-110 transition duration-500 cursor-pointer">
                            <img src="{{ asset('assets/images/home/Pengabdian Masyarakat.png') }}"
                                alt="Pengabdian Masyarakat"
                                class="w-full sm:w-[400px] lg:w-[512px] h-auto object-cover shadow-2xl">
                            <div
                                class="absolute top-[-15px] left-1/2 transform -translate-x-1/2 w-[274.29px] h-[33.41px] rounded-md bg-[#21A652] text-white italic font-semibold flex justify-center items-center shadow-2xl">
                                Pengabdian Masyarakat
                            </div>
                            <a href="{{ route('community-service.index') }}" class="absolute inset-0"></a>
                        </div>
                    </div>
                </div>

            </section>

        </main>
        {{-- footer --}}

        <!-- JavaScript -->
        <script src="{{ asset('assets/js/navbar.js') }}"></script>
    </div>


</x-guest-layout>

