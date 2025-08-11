@push("styles")
  <link
    rel="stylesheet"
    href="{{ asset("assets/css/swiperSlider3card.css") }}"
  />
@endpush

<x-guest-layout>
  <div>
    <header>
      @include('public.components.navbar')
      <div class="relative h-[30vh] w-full bg-[#2593CF] md:h-[45vh]">
        <div
          class="absolute left-[50%] top-[50%] h-[181px] w-11/12 -translate-x-[50%] md:top-[35%] md:h-[400px] md:w-5/6"
        >
          <div
            class="relative flex h-full w-full flex-col justify-center overflow-hidden rounded-[30px] bg-cover bg-bottom bg-no-repeat text-white md:rounded-[50px]"
            style="background-image: url('/assets/images/activity/ImgInnovil.png')"
          >
            <!-- Overlay hitam transparan -->
            <div class="absolute inset-0 bg-black opacity-50"></div>

            <div class="relative z-10">
              <h1 class="text-center text-2xl font-bold md:text-5xl">
                Innovillage
              </h1>
              <h1 class="text-center font-extralight md:text-4xl">
                Center of Excellent Smart Tourism & Hospitality
              </h1>
            </div>
          </div>
        </div>
      </div>
    </header>
    <main class="mt-24 flex flex-col items-center md:mt-[252px]">
      <div class="relative w-11/12 md:w-5/6">
        <img
          src="{{ asset("assets/images/activity/imgInno.png") }}"
          alt="img"
          class="h-[200px] object-cover max-md:w-full md:h-[350px] md:w-[610px]"
        />
        <div
          class="absolute flex flex-col justify-center bg-[#FF8A00B2] px-5 text-white shadow-customBox max-md:p-5 md:right-[40px] md:top-[50%] md:h-[350px] md:w-[678px] md:-translate-y-[50%]"
        >
          <h5 class="mb-3 text-xl font-semibold md:text-2xl">Innovillage</h5>
          <p class="text-justify text-sm font-light md:text-lg">
              Innovillage adalah program yang bertujuan mendorong inovasi dalam pengembangan desa wisata dengan memanfaatkan
              teknologi dan solusi kreatif. Program ini melibatkan kolaborasi antara pemerintah, akademisi, dan masyarakat
              lokal untuk meningkatkan daya tarik, keberlanjutan, dan pengelolaan desa wisata. Innovillage mendorong
              pengembangan infrastruktur, pemberdayaan masyarakat, dan penggunaan teknologi untuk meningkatkan pengalaman
              wisata dan akses informasi, sehingga dapat memperkuat sektor pariwisata di daerah tersebut.
          </p>
        </div>
      </div>
      {{-- page card --}}
      <div class="mb-5 mt-[230px] w-11/12 max-md:mt-[350px] md:mb-10 md:mt-16">
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
          @foreach ($innovillages as $innovillage)
            <div class="overflow-hidden rounded-xl shadow-customBox hover:scale-105 transition duration-500 cursor-pointer border-2 border-[#D9D9D9]">
              <div class="h-[189px]">
                <img
                  src="{{ $innovillage->first_photo->photo_url }}"
                  alt="{{ $innovillage->title }}"
                  class="h-full w-full bg-gray-300 object-cover"
                />
              </div>
              <div class="relative px-5 pt-4">
                <span
                  class="absolute -top-[22px] right-0 flex w-[98px] justify-center rounded-l-full bg-orange1 py-2 font-semibold text-white bg-[#FF8A00B2]"
                >
                  {{ $innovillage->year }}
                </span>
                <h5 class="truncate text-xl font-semibold">
                  {{ $innovillage->title }}
                </h5>
                <p class="line-clamp-3 text-justify text-sm">
                  {{ $innovillage->description }}
                </p>
              </div>
              <div class="border-t border-[#959393] px-5 py-5 text-center text-orange1">
                <a
                  href="{{ route('innovillage.show', ['innovillage' => $innovillage->id]) }}"
                  class="flex w-fit items-center mx-auto"
                >
                  Baca Selengkapnya
                  <svg
                    class="h-[35px] w-[35px] pt-1"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                  >
                    <path
                      stroke="currentColor"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="1"
                      d="M19 12H5m14 0-4 4m4-4-4-4"
                    />
                  </svg>
                </a>
              </div>
            </div>
          @endforeach
        </div>

        {{-- Pagination --}}
        @if($innovillages->hasPages())
        <div class="mt-8 flex justify-center">
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
