<x-guest-layout>
    <div>
        <header>
            @include('public.components.navbar')
        </header>
        <main class="flex flex-col items-center pt-[120px]">
          <div class="relative w-11/12 md:w-5/6">
            <div class="mb-5 flex justify-center underline">
              <h1
                class="text-4xl font-bold self-center mb-1 rounded-[10px] p-2"
              >
                Jurnal Penelitian
              </h1>
            </div>
            @foreach ($journals as $journal)
              {{-- card journal --}}
              <div
                class="mb-5 flex flex-col rounded-md border-2 border-[#D9D9D9] p-5"
              >
              <div class="mb-5">
                <h5 class="mb-2 line-clamp-3 text-center text-xl font-semibold">
                  {{ $journal->title }}
                </h5>
              </div>
                <div class="flex gap-x-3 max-md:flex-col">
                  <img
                    src="{{ $journal->photo_url }}"
                    alt="Journal Image"
                    class="h-[250px] w-full bg-gray-300 object-cover md:w-[330px] md:min-w-[330px]"
                  />

                  <!-- Bagian teks -->
                  <div>
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
                        {{ date("d F Y", strtotime($journal->date)) }}
                      </span>
                    </div>

                    <!-- Nama penulis -->
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
                          d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                          clip-rule="evenodd"
                        />
                      </svg>
                      <span class="ml-2">{{ $journal->writer }}</span>
                    </div>

                    <!-- ID -->
                    <div class="mb-2 flex items-center text-lg">
                      <img
                        src="{{ asset("assets/images/activity/ID.png") }}"
                        alt="icon"
                        class="h-[15px] ps-1"
                      />
                      <a
                        href="{{ $journal->doi_link }}"
                        target="_blank"
                        class="ml-3 text-blue-500 underline"
                      >
                        {{ $journal->doi_link }}
                      </a>
                    </div>

                    <!-- Deskripsi Jurnal -->
                    <p class="line-clamp-4 text-justify text-lg">
                      {{ $journal->description }}
                    </p>
                  </div>
                </div>

                <!-- Tombol Selengkapnya -->
                <div class="mt-2 flex justify-end">
                  <a href="{{ $journal->journal_link }}" target="_blank">
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
