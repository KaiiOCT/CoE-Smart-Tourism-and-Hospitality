@push("styles")
  <link
    rel="stylesheet"
    href="{{ asset("assets/css/swiperSlider3card.css") }}"
  />
@endpush

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

    <main class="mt-24 flex flex-col items-center md:mt-[220px] font-sans">
      <!-- Hero Section -->
      <div class="relative w-11/12 md:w-5/6">
        <img
          src="{{ asset('assets/images/activity/imgInno.png') }}"
          alt="Innovillage"
          class="h-[220px] md:h-[400px] md:w-[620px] object-cover rounded-lg shadow-lg"
        />
        <div
          class="absolute flex flex-col justify-center bg-gradient-to-r from-[#FF8A00B2] to-[#FFB14DCC] backdrop-blur-sm px-6 py-8 text-white shadow-xl rounded-lg max-md:static md:right-[40px] md:top-1/2 md:h-[400px] md:w-[680px] md:-translate-y-1/2"
        >
          <h5 class="mb-3 text-2xl font-bold md:text-3xl drop-shadow-lg">Innovillage</h5>
          <p class="text-justify text-sm md:text-lg leading-relaxed">
            Innovillage adalah program yang bertujuan mendorong inovasi dalam pengembangan desa wisata
            dengan memanfaatkan teknologi dan solusi kreatif. Program ini melibatkan kolaborasi antara
            pemerintah, akademisi, dan masyarakat lokal untuk meningkatkan daya tarik, keberlanjutan,
            dan pengelolaan desa wisata. Innovillage mendorong pengembangan infrastruktur,
            pemberdayaan masyarakat, dan penggunaan teknologi untuk meningkatkan pengalaman wisata dan
            akses informasi, sehingga dapat memperkuat sektor pariwisata di daerah tersebut.
          </p>
        </div>
      </div>

      <!-- Card Section -->
      <div class="mb-10 mt-[250px] w-11/12 max-md:mt-16 md:mt-20">
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
          @foreach ($innovillages as $innovillage)
            <div
              class="overflow-hidden rounded-xl shadow-md hover:shadow-xl hover:scale-[1.03] transition-all duration-500 cursor-pointer border border-gray-200 bg-white"
            >
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>


              <!-- Card Image -->
              <div class="h-[190px] overflow-hidden">
                <img
                  src="{{ $innovillage->first_photo->photo_url }}"
                  alt="{{ $innovillage->title }}"
                  class="h-full w-full object-cover transform hover:scale-110 transition duration-700"
                />
              </div>

              <!-- Card Content -->
              <div class="relative px-5 pt-5">
                <span
                  class="absolute -top-[22px] right-0 flex w-[98px] justify-center rounded-l-full bg-gradient-to-r from-orange-500 to-orange-400 py-2 font-semibold text-white shadow-md"
                >
                  {{ $innovillage->year }}
                </span>
                <h5 class="truncate text-lg font-bold text-gray-800">
                  {{ $innovillage->title }}
                </h5>
                <p class="line-clamp-3 text-justify text-sm text-gray-600 mt-2">
                  {{ $innovillage->description }}
                </p>
              </div>

              <!-- Card Footer -->
              <div class="border-t border-gray-200 px-5 py-4 text-center">
                <a
                  href="{{ route('innovillage.show', ['innovillage' => $innovillage->id]) }}"
                  class="flex items-center justify-center gap-1 text-orange-500 hover:text-orange-600 font-semibold transition"
                >
                  Baca Selengkapnya
                  <svg
                    class="h-[20px] w-[20px]"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="1.8"
                      d="M19 12H5m14 0-4 4m4-4-4-4"
                    />
                  </svg>
                </a>
              </div>
            </div>
          @endforeach
        </div>

        <!-- Pagination -->
        @if($innovillages->hasPages())
          <div class="mt-10 flex justify-center">
            {{ $innovillages->links() }}
          </div>
        @endif
      </div>
    </main>

    <!-- JavaScript -->
    <script src="{{ asset("assets/js/navbar.js") }}"></script>

    {{-- swiper --}}
    <script src="{{ asset("assets/js/swiper.js") }}"></script>
  </div>
</x-guest-layout>
