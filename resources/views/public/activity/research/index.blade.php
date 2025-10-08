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
                        Riset dan Publikasi
                    </span>
                </div>

                <div class="pt-5">
                    <p class="text-[15px] sm:text-lg lg:text-xl text-[#bbbbbb] text-center">
                    Dengan riset yang terencana dan publikasi yang terukur, 
                    kami berupaya menghadirkan pengetahuan baru yang relevan dan berdampak luas
                    </p>
                </div>
            </div>
            </div>
        </header>

        <main class="mt-36 flex flex-col items-center">
            {{-- Container 1: Kegiatan Riset --}}
            <section class="mb-16 w-10/12 max-w-6xl rounded-[30px] bg-white p-10 border border-gray-400 shadow-xl transition-all duration-300 transform hover:scale-[1.01] hover:shadow-2xl">
                <div class="text-center mb-10">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="mx-auto mb-6 h-20 w-20 object-contain" />
                    <h1 class="text-2xl font-bold text-gray-800 md:text-4xl drop-shadow-md">Kegiatan Riset 
                      <br>
                      CoE Smart Tourism & Hospitality</h1>
                </div>
                <div class="text-justify text-base text-gray-700 md:text-lg leading-relaxed break-words">
                    <p class="mb-5">
                        Center of Excellence Smart Tourism & Hospitality (CoE STH) memiliki komitmen kuat dalam mendukung kemajuan sektor pariwisata dan hospitality melalui pengembangan publikasi ilmiah yang berkualitas. Sebagai pusat riset terkemuka, CoE STH secara konsisten menghasilkan berbagai jurnal penelitian yang membahas isu-isu terkini dalam industri ini.
                    </p>
                    <p>
                        Publikasi tersebut mencakup topik seperti pemanfaatan teknologi digital, pengembangan destinasi berbasis komunitas, serta strategi keberlanjutan. Kami terus berupaya memberikan kontribusi signifikan melalui riset yang berdampak luas secara lokal maupun global.
                    </p>
                </div>
            </section>

            {{-- Container 2: Hasil Penelitian --}}
            <section class="mb-16 w-10/12 max-w-6xl rounded-[30px] bg-white p-10 border border-gray-400 shadow-xl transition-all duration-300 transform hover:scale-[1.01] hover:shadow-2xl">
                <div class="text-center mb-10">
                    <img src="{{ asset('assets/icons/analysis.png') }}" alt="Icon" class="mx-auto mb-6 h-20 w-20 object-contain" />
                    <h2 class="text-2xl font-bold text-gray-800 md:text-4xl drop-shadow-md">
                        Hasil Penelitian dan Publikasi
                        <br>
                        CoE Smart Tourism & Hospitality
                    </h2>
                </div>

                <p class="text-justify text-base text-gray-700 md:text-lg leading-relaxed break-words">
                    Beberapa hasil yang pernah kami lakukan mencakup berbagai upaya yang telah kami rancang, laksanakan, dan evaluasi dengan penuh komitmen. Pencapaian ini mencerminkan dedikasi kami dalam memberikan kontribusi nyata dan berkelanjutan, serta menciptakan dampak positif di tingkat lokal maupun global.
                </p>
            </section>

            {{-- Jurnal Penelitian Card (di luar container, posisi tengah) --}}
            <div class="mb-20 flex justify-center w-full">
                <div class="group w-[85%] max-w-md overflow-hidden rounded-2xl border border-gray-300 bg-white shadow-xl transition duration-300 hover:scale-[1.02] hover:shadow-2xl">
                    <div class="relative h-52 w-full">
                        <img src="{{ asset('assets/images/activity/imgJurnal.png') }}" alt="Jurnal Penelitian" class="h-full w-full object-cover" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                    </div>
                    <div class="px-6 py-5 text-center">
                        <h5 class="mb-2 text-xl font-bold text-gray-800">Jurnal Penelitian</h5>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            Beberapa penelitian yang telah dilaksanakan oleh tim CoE Smart Tourism & Hospitality, yang berfokus pada inovasi, teknologi, dan pengembangan sektor pariwisata.
                        </p>
                    </div>
                    <div class="border-t border-gray-200 px-6 py-4 text-center">
                        <a href="{{ route('journal.index') }}"
                          class="inline-block rounded-full bg-blue-600 px-6 py-2 text-sm font-medium text-white shadow-md transition duration-300 hover:bg-blue-700 hover:shadow-lg">
                            Selengkapnya
                        </a>
                    </div>
                </div>
            </div>

        </main>

        <script src="{{ asset('assets/js/navbar.js') }}"></script>
    </div>
</x-guest-layout>
