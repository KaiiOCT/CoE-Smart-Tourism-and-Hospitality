<x-guest-layout>
    <div>
        {{-- ==== HEADER ==== --}}
        @include('public.components.navbar')
        <div class="relative h-[30vh] w-full bg-[#2593CF] md:h-[45vh]">
            <div class="absolute left-1/2 top-1/2 h-[181px] w-11/12 -translate-x-1/2 md:top-[35%] md:h-[400px] md:w-5/6">
                <div class="relative flex h-full w-full flex-col justify-center overflow-hidden rounded-[30px] bg-cover bg-bottom bg-no-repeat text-white md:rounded-[50px]"
                    style="background-image: url('/assets/images/home/Pengabdian Masyarakat.png')">
                    <div class="absolute inset-0 bg-black opacity-50"></div>
                    <div class="relative z-10 text-center">
                        <h1 class="text-2xl font-bold md:text-5xl">Pengabdian Masyarakat</h1>
                        <h2 class="font-extralight md:text-4xl">Center of Excellence Smart Tourism & Hospitality</h2>
                    </div>
                </div>
            </div>
        </div>

        {{-- ==== MAIN CONTENT ==== --}}
        <main class="mt-36 flex flex-col items-center">

            {{-- Container 1: Deskripsi Umum --}}
            <section class="mb-16 w-10/12 max-w-6xl rounded-[30px] bg-white p-10 border border-gray-400 shadow-xl transition-all duration-300 transform hover:scale-[1.01] hover:shadow-2xl">
                <div class="text-center mb-10">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="mx-auto mb-6 h-20 w-20 object-contain" />
                    <h1 class="text-2xl font-bold text-gray-800 md:text-4xl drop-shadow-md">
                        Kegiatan Pengabdian Masyarakat 
                        <br>CoE Smart Tourism & Hospitality
                    </h1>
                </div>
                <div class="text-justify text-base text-gray-700 md:text-lg leading-relaxed break-words">
                    <p class="mb-5">
                        CoE Smart Tourism & Hospitality berkomitmen tinggi untuk membina dan memberdayakan masyarakat di sektor pariwisata melalui program pelatihan, pengembangan potensi lokal, serta penerapan teknologi. Fokus utama adalah menciptakan transformasi sosial yang inklusif dan berkelanjutan di destinasi wisata.
                    </p>
                    <p>
                        Dengan menggandeng mitra strategis seperti pemerintah daerah dan komunitas lokal, CoE STH mengembangkan ekosistem yang adaptif terhadap perubahan zaman, serta mendorong keberlanjutan dan daya saing industri pariwisata nasional.
                    </p>
                </div>
            </section>

            {{-- Container 2: Daftar Kegiatan --}}
            <section class="mb-20 w-10/12 max-w-6xl rounded-[30px] bg-white p-10 border border-gray-400 shadow-xl transition-all duration-300 transform hover:scale-[1.01] hover:shadow-2xl">
                <div class="text-center mb-10">
                    <img src="{{ asset('assets/icons/clipbboard.png') }}" alt="Icon" class="mx-auto mb-6 h-20 w-20 object-contain" />
                    <h2 class="text-2xl font-bold text-gray-800 md:text-4xl drop-shadow-md">
                        Kegiatan Pengabdian 
                        <br>
                        yang Telah Dilaksanakan
                    </h2>
                </div>

                <p class="text-justify text-base text-gray-700 md:text-lg leading-relaxed break-words mb-8">
                    Program-program yang telah dijalankan mencakup kolaborasi dengan IHKA, pelatihan berbasis komunitas, pengembangan UMKM wisata, serta digitalisasi promosi destinasi. Setiap inisiatif bertujuan untuk menciptakan dampak transformasional dan memperkuat partisipasi aktif masyarakat dalam industri pariwisata modern.
                </p>

                {{-- Dynamic Cards --}}
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    @foreach ($community_services as $community_service)
                        <div class="overflow-hidden rounded-xl border border-[#D9D9D9] shadow-customBox transition duration-500 hover:scale-105 cursor-pointer">
                            <div class="h-[189px]">
                                <img src="{{ $community_service->first_photo->photo_url }}" alt="{{ $community_service->title }}" class="h-full w-full object-cover" />
                            </div>
                            <div class="px-5 py-3 text-center">
                                <h5 class="text-lg font-semibold">{{ $community_service->title }}</h5>
                                <p class="line-clamp-3 text-base text-justify">{{ $community_service->description }}</p>
                            </div>
                            <div class="border-t border-[#959393] py-4 text-center">
                                <a href="{{ route('community-service.show', ['id' => $community_service->id]) }}" class="text-sm font-semibold">Selengkapnya</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                

                {{-- Pagination --}}
                @if($community_services->hasPages())
                    <div class="mt-8 flex justify-center">
                        {{ $community_services->links() }}
                    </div>
                @endif
            </section>

            {{-- Card Innovillage (di luar container, tengah) --}}
            <div class="mb-20 flex justify-center w-full">
                <div class="group w-[85%] max-w-md overflow-hidden rounded-2xl border border-gray-300 bg-white shadow-xl transition duration-300 hover:scale-[1.02] hover:shadow-2xl">
                    <div class="relative h-52 w-full">
                        <img src="{{ asset('assets/images/activity/imgInno.png') }}" alt="Innovillage" class="h-full w-full object-cover" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                    </div>
                    <div class="px-6 py-5 text-center">
                        <h5 class="mb-2 text-xl font-bold text-gray-800">Innovillage</h5>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            Sebuah program inovatif untuk mendorong kemajuan desa melalui pendekatan teknologi dan kolaborasi, dalam rangka memperkuat kapasitas lokal secara berkelanjutan.
                        </p>
                    </div>
                    <div class="border-t border-gray-200 px-6 py-4 text-center">
                        <a href="{{ route('innovillage.index') }}"
                          class="inline-block rounded-full bg-blue-600 px-6 py-2 text-sm font-medium text-white shadow-md transition duration-300 hover:bg-blue-700 hover:shadow-lg">
                            Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
        </main>

        {{-- Scripts --}}
        <script src="{{ asset('assets/js/navbar.js') }}"></script>
    </div>
</x-guest-layout>
