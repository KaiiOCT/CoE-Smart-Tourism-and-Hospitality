<x-guest-layout>
    <div>
        <header>
          @include('public.components.navbar')
        </header>

        <main class="flex flex-col items-center pt-[120px]">
          <div class="relative w-11/12 md:w-5/6">
            <div class="mb-5 flex justify-center">
                <img src="{{ asset('assets/images/activity/rumahJurnal.png') }}" alt="rumah jurnal">
            </div>
            @foreach ($trainings as $training)
              {{-- card journal --}}
              <div
                wire:key="training-{{ $training->id }}"
                class="mb-4 flex flex-col rounded-md border-2 border-[#D9D9D9] p-5"
              >
                <div class="flex max-md:flex-col">
                  <!-- Iframe untuk menampilkan PDF -->
                  <img
                    src="{{ asset("storage/" . $training->photo) }}"
                    alt="{{ $training->title }}"
                    class="mr-5 h-[250px] w-full min-w-full bg-gray-300 md:w-[330px] md:min-w-[330px]"
                  />
                  <!-- Bagian teks -->
                  <div>
                    <h5 class="mb-2 line-clamp-1 text-2xl font-semibold">
                      {{ $training->title }}
                    </h5>
                    <!-- Tanggal -->
                    <div class="mb-2 flex items-center text-lg">
                      <svg
                        class="h-6 w-6"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        fill="none"
                        viewBox="0 0 24 24"
                      >
                        <path
                          stroke="currentColor"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z"
                        />
                      </svg>
                      <span class="ml-2 border-2 border-[#D9D9D9] rounded-md p-1">
                        {{ date("d F Y", strtotime($training->date)) }}
                      </span>
                    </div>

                    <!-- Lokasi -->
                    <div class="mb-2 flex items-center text-lg">
                      <svg
                        class="h-6 w-6"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z"
                          clip-rule="evenodd"
                        />
                      </svg>

                      <span class="ml-2">{{ $training->location }}</span>
                    </div>

                    <!-- ID -->
                    <div class="mb-2 flex items-center text-lg">
                      <img
                        src="{{ asset("assets/images/activity/key.png") }}"
                        alt="icon"
                        class="h-[20px]"
                      />
                      <span class="ml-3">{{ $training->type }}</span>
                    </div>

                    <!-- Deskripsi Jurnal -->
                    <p class="line-clamp-4 text-justify text-lg">
                      {{ $training->description }}
                    </p>
                  </div>
                </div>

                <!-- Tombol Selengkapnya -->
                <div class="mt-2 flex justify-end">
                  <a href="#">
                    <button class="rounded-md bg-[#CCE2FF] px-3 py-1 underline">
                      Selengkapnya
                    </button>
                  </a>
                </div>
              </div>
            @endforeach
          </div>
          @include('layouts.pagination')
        </main>
      </div>
    </x-guest-layout>
