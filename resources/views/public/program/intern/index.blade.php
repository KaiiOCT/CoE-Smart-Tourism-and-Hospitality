<x-guest-layout>
  <div>
    {{-- ==== HEADER ==== --}}
    @include('public.components.navbar')
    <div class="relative h-[30vh] w-full bg-[#2593CF] md:h-[45vh]">
      <div class="absolute left-1/2 top-1/2 h-[181px] w-11/12 -translate-x-1/2 md:top-[35%] md:h-[400px] md:w-5/6">
        <div class="relative flex h-full w-full flex-col justify-center overflow-hidden rounded-[30px] bg-cover bg-center text-white md:rounded-[50px]" style="background-image: url('/assets/images/home/imgMBKM.png')">
          <div class="absolute inset-0 bg-black opacity-50"></div>
          <div class="relative z-10 text-center">
            <h1 class="text-2xl font-bold md:text-5xl">MBKM dan Magang</h1>
            <h2 class="font-extralight md:text-4xl">Center of Excellence Smart Tourism & Hospitality</h2>
          </div>
        </div>
      </div>
    </div>

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
