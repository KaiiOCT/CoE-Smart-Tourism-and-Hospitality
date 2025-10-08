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
                        MBKM dan Magang
                    </span>
                </div>

                <div class="pt-5">
                    <p class="text-[15px] sm:text-lg lg:text-xl text-[#bbbbbb] text-center">
                        Program MBKM dan Magang memberikan kesempatan bagi mahasiswa untuk mengembangkan kompetensi, 
                        memperluas wawasan, serta memperoleh pengalaman praktis di dunia kerja. Melalui kolaborasi dengan berbagai 
                        mitra industri dan lembaga, kami mendorong terciptanya lulusan yang adaptif, inovatif, dan siap bersaing di 
                        tingkat nasional maupun global
                    </p>
                </div>
            </div>
            </div>
        </header>

    <main class="mt-36 flex flex-col items-center">
      {{-- Container 1: Penjelasan MBKM --}}
      <section class="mb-16 w-10/12 max-w-6xl rounded-[30px] bg-white p-10 border border-gray-400 shadow-xl transition-all duration-300 transform hover:scale-[1.01] hover:shadow-2xl">
        <div class="text-center mb-10">
          <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="mx-auto mb-6 h-20 w-20 object-contain" />
          <h1 class="text-2xl font-bold text-gray-800 md:text-4xl drop-shadow-md">Program MBKM dan Magang</h1>
        </div>
        <div class="text-justify text-base text-gray-700 md:text-lg leading-relaxed break-words">
          <p class="mb-5">
            Merdeka Belajar – Kampus Merdeka (MBKM) merupakan inisiatif Kementerian Pendidikan untuk memberikan fleksibilitas pembelajaran kepada mahasiswa melalui aktivitas di luar kampus, seperti magang, penelitian, dan pengabdian masyarakat.
          </p>
          <p>
            Dalam konteks ini, magang menjadi sarana strategis untuk mengasah keterampilan praktis mahasiswa, membangun koneksi industri, serta memahami tantangan dunia kerja secara langsung. Program ini dirancang untuk memberi manfaat ganda: memperkuat kapasitas mahasiswa dan mendukung kebutuhan industri akan talenta siap kerja.
          </p>
        </div>
      </section>

      {{-- Container 2: Intern Showcase --}}
      <section class="mb-16 w-10/12 max-w-6xl rounded-[30px] bg-white p-10 border border-gray-400 shadow-xl transition-all duration-300 transform hover:scale-[1.01] hover:shadow-2xl">
        <div class="text-center mb-10">
          <img src="{{ asset('assets/icons/analysis.png') }}" alt="Icon" class="mx-auto mb-6 h-20 w-20 object-contain" />
          <h2 class="text-2xl font-bold text-gray-800 md:text-4xl drop-shadow-md">
            Intern CoE Smart Tourism & Hospitality
          </h2>
        </div>

        @if (count($interns) > 0)
          @foreach ($interns as $intern)
            <div class="mt-10 flex max-md:flex-col max-md:items-center">
              <img
                src="{{ $intern->photo_url }}"
                alt="{{ $intern->name }}"
                class="h-[300px] min-h-[300px] w-[300px] min-w-[300px] rounded-xl bg-gray-300 object-cover shadow-md"
              />
              <div class="max-md:mt-5 md:ms-5 text-gray-700">
                <h5 class="text-xl font-semibold">{{ $intern->name }}</h5>

                @if (count($intern->majors) > 0)
                  <div class="my-2 flex flex-wrap gap-2">
                    @foreach ($intern->majors as $major)
                      <span class="min-w-20 rounded-md border border-slate-400 px-2 text-sm text-center">{{ $major->name }}</span>
                    @endforeach
                  </div>
                @endif

                <p class="text-justify text-base md:text-lg leading-relaxed">{{ $intern->description }}</p>

                @if (count($intern->projects) > 0)
                  <div class="mt-4">
                    <p class="font-bold">Project Terkait:</p>
                    <div class="flex flex-wrap gap-2 mt-1">
                      @foreach ($intern->projects as $project)
                        <span class="min-w-20 rounded-md border border-slate-400 px-2 text-sm text-center">{{ $project->name }}</span>
                      @endforeach
                    </div>
                  </div>
                @endif
              </div>
            </div>
          @endforeach
        @endif
      </section>

    </main>

    <script src="{{ asset('assets/js/navbar.js') }}"></script>
  </div>
</x-guest-layout>
