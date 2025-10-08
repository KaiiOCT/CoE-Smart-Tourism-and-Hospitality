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
                        Jurnal Penelitian
                    </span>
                </div>

                <div class="pt-5">
                    <p class="text-[15px] sm:text-lg lg:text-xl text-[#bbbbbb] text-center">
                    Jurnal Penelitian ini menjadi wadah untuk menyebarluaskan hasil riset berkualitas, 
                    memberikan kontribusi nyata bagi pengembangan ilmu pengetahuan dan teknologi
                    </p>
                </div>
            </div>
            </div>
        </header>

      <main class="flex flex-col items-center bg-white pt-[120px]">
        <div class="relative w-11/12 md:w-5/6">
          <!-- Judul -->
          <div class="text-center mb-20">
                  <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-800 leading-tight mb-4">
                      Jurnal<br class="hidden sm:block" />
                      Penelitian
                  </h2>
                  <!-- GARIS DEKORATIF -->
                  <div class="flex justify-center">
                      <span class="inline-block w-16 h-[2px] bg-gray-300"></span>
                      <span class="inline-block w-6 h-[2px] bg-[#F6A11F] mx-1"></span>
                      <span class="inline-block w-16 h-[2px] bg-gray-300"></span>
                  </div>
              </div>

          @foreach ($journals as $journal)
            <!-- Card Journal -->
            <div class="mb-8 flex flex-col rounded-lg border border-gray-200 bg-white shadow-md hover:shadow-lg transition duration-300 p-5">
              <!-- Judul Jurnal -->
              <div class="mb-4">
                <h5 class="mb-2 text-center text-2xl font-semibold text-[#34495E] line-clamp-3">
                  {{ $journal->title }}
                </h5>
              </div>

              <div class="flex gap-x-4 max-md:flex-col">
                <!-- Gambar -->
                <img
                  src="{{ $journal->photo_url }}"
                  alt="Journal Image"
                  class="h-[250px] w-full md:w-[330px] md:min-w-[330px] object-cover rounded-lg"
                />

                <!-- Detail -->
                <div class="flex flex-col justify-between">
                  <div>
                    <!-- Tanggal -->
                    <div class="mb-3 flex items-center text-lg text-gray-700">
                      <svg class="h-6 w-6 text-[#F6A11F]" fill="none" stroke="currentColor" stroke-width="2"
                          viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1z" />
                      </svg>
                      <span class="ml-2 border border-gray-300 rounded-md px-2 py-1">
                        {{ date("d F Y", strtotime($journal->date)) }}
                      </span>
                    </div>

                    <!-- Penulis -->
                    <div class="mb-3 flex items-center text-lg text-gray-700">
                      <svg class="h-6 w-6 text-[#F6A11F]" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                              d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Z"
                              clip-rule="evenodd" />
                      </svg>
                      <span class="ml-2">{{ $journal->writer }}</span>
                    </div>

                    <!-- DOI -->
                    <div class="mb-3 flex items-center text-lg">
                      <img src="{{ asset('assets/images/activity/Arsygo.png') }}" alt="icon" class="h-[15px]">
                      <a href="{{ $journal->doi_link }}" target="_blank" class="ml-3 text-blue-600 underline">
                        {{ $journal->doi_link }}
                      </a>
                    </div>

                    <!-- Deskripsi -->
                    <p class="text-justify text-gray-700 leading-relaxed line-clamp-4">
                      {{ $journal->description }}
                    </p>
                  </div>

                  <!-- Tombol Selengkapnya -->
                  <div class="mt-4 flex justify-end">
                    <a href="{{ $journal->journal_link }}" target="_blank">
                      <button class="rounded-md bg-[#CCE2FF] px-4 py-2 text-sm font-semibold text-[#2C3E50] hover:bg-[#b3d4ff] transition">
                        Selengkapnya
                      </button>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        @include('layouts.pagination')
      </main>

      </div>
</x-guest-layout>
