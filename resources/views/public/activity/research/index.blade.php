<x-guest-layout>
    <div>
        {{-- ==== HEADER ==== --}}
        @include('public.components.navbar')
        <div class="relative h-[30vh] w-full bg-[#2593CF] md:h-[45vh]">
            <div class="absolute left-1/2 top-1/2 h-[181px] w-11/12 -translate-x-1/2 md:top-[35%] md:h-[400px] md:w-5/6">
                <div class="relative flex h-full w-full flex-col justify-center overflow-hidden rounded-[30px] bg-cover bg-bottom bg-no-repeat text-white md:rounded-[50px]"
                    style="background-image: url('/assets/images/research.png')">
                    <div class="absolute inset-0 bg-black opacity-50"></div>
                    <div class="relative z-10 text-center">
                        <h1 class="text-2xl font-bold md:text-5xl">Riset dan Publikasi</h1>
                        <h2 class="font-extralight md:text-4xl">Center of Excellence Smart Tourism & Hospitality</h2>
                    </div>
                </div>
            </div>
        </div>

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
