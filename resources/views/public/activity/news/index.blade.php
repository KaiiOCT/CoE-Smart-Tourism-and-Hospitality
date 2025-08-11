<x-guest-layout>
    <div>
        <header>
            @include('public.components.navbar')
            <div class="relative h-[30vh] w-full bg-[#2593CF] md:h-[45vh]">
        <div
          class="absolute left-[50%] top-[50%] h-[181px] w-11/12 -translate-x-[50%] md:top-[35%] md:h-[400px] md:w-5/6"
        >
          <div
            class="relative flex h-full w-full flex-col justify-center overflow-hidden rounded-[30px] text-white md:rounded-[50px]"
          >
            <img
              src="{{ asset("storage/" . $mainNews->photo) }}"
              alt="{{ $mainNews->title }}"
              class="absolute -z-10 h-full w-full bg-Fgray-300 object-cover"
            />
            <!-- Overlay hitam transparan -->
            <div class="absolute inset-0 bg-black opacity-10"></div>
            <span
              class="absolute left-5 top-5 rounded-md bg-[#2593CF] px-2 py-1 max-md:text-xs md:rounded-xl md:px-5 md:py-1"
            >
              Berita Terkini
            </span>
            <div class="absolute bottom-10 left-5">
              {{-- Date --}}
              <div
                class="flex w-fit rounded-3xl bg-slate-600 bg-opacity-50 px-2 py-1 backdrop-blur-sm md:px-5 md:py-2"
              >
                <svg
                  class="h-4 w-4 text-gray-800 md:h-6 md:w-6"
                  aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg"
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
                <span class="ms-3 max-md:text-xs">
                  {{ date("d F Y", strtotime($mainNews->date)) }}
                </span>
              </div>
              {{-- subjudul --}}
              <h5
                class="line-clamp-2 w-6/12 text-[10px] font-semibold md:w-9/12 md:text-lg"
              >
                {{ $mainNews->title }}
              </h5>
            </div>
            {{-- button selengkapnya --}}
            <a
              href="{{ $mainNews->link }}"
              class="absolute bottom-3 right-3 flex items-center rounded-xl bg-[#2593CF] bg-opacity-80 px-5 py-1 md:bottom-10 md:right-10"
            >
              <span class="max-md:text-xs md:text-base">Selengkapnya</span>
              <svg
                class="h-4 w-4 md:h-[36px] md:w-[36px]"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M19 12H5m14 0-4 4m4-4-4-4"
                />
              </svg>
            </a>
          </div>
        </div>
      </div>
    </header>
    <main class="mt-24 flex flex-col items-center md:mt-[252px]">
      {{-- navigasi --}}
      <div class="w-11/12 pb-10 md:w-5/6">
        <nav
          class="rounded-2xl px-5 py-3 md:rounded-[30px] md:py-5"
          style="
            box-shadow:
              3px 4px 3px #00000062,
              -1px -1px 2px rgba(0, 0, 0, 0.186);
          "
        >
          <ol
            class="flex font-semibold max-md:justify-between max-md:px-5 md:ps-5 md:text-lg"
          >
            <li class="{{ $category_id == "" ? "text-orange1" : "" }}">
                <a href="{{ route('news.index') }}">Semua</a>
            </li>
            @foreach ($categories as $category)
                <span class="mx-3">|</span>
                <li class="{{ $category_id == $category->id ? "text-orange1" : "" }}">
                    <a href="{{ route('news.index', ['category_id' => $category->id]) }}">
                        {{ $category->name }}
                    </a>
                </li>
            @endforeach
          </ol>
        </nav>
      </div>
      {{-- Item --}}
      <div class="w-11/12 md:w-5/6">
        {{-- isi item [lakukan perulangan disini] --}}
        @foreach ($newses as $news)
          <div
            wire:key="news-{{ $news->id }}"
            class="mb-5 flex max-md:flex-col md:mb-10 md:justify-between "
          >
            <div
              class="h-[200px] overflow-hidden rounded-t-3xl max-md:w-full md:w-[32%] md:rounded-3xl"
            >
              <img
                src="{{ asset("storage/" . $news->photo) }}"
                alt="{{ $news->title }}"
                class="h-full w-full bg-gray-300"
              />
            </div>
            <div
              class="box-border flex flex-col justify-center overflow-hidden rounded-b-3xl p-5 shadow-customBox max-md:w-full max-md:pt-3 md:h-[200px] md:w-[67%] md:rounded-3xl rounded-[30px] border border-[#D9D9D9]"
            >
              {{-- date and title --}}
              <div class="flex">
                <div
                  class="me-3 flex w-fit items-center rounded-md border border-[#D9D9D9] px-2 text-[#585757] md:px-3"
                >
                  <svg
                    class="w-5 max-md:h-4 max-md:w-3"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
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
                  <span class="ms-3 text-sm max-md:text-xs">
                    {{ date("d F Y", strtotime($news->date)) }}
                  </span>
                </div>
                <div
                  class="w-fit rounded-md border border-[#D9D9D9] px-2 py-1 text-[#585757] md:px-8"
                >
                  <span class="text-sm">&bull; {{ $news->category->name }}</span>
                </div>
              </div>
              <h5 class="line-clamp-1 text-lg font-semibold py-1">
                {{ $news->title }}
              </h5>
              <p class="line-clamp-2 text-base">{{ $news->description }}</p>
              <a href="{{ $news->link }}" class="text-lg font-medium">
                <div class="flex items-center underline pt-4">
                  <span>Selengkapnya</span>
                  <svg
                    class="h-[30px] w-[30px] pt-1"
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
                </div>
              </a>
            </div>
          </div>
        @endforeach
      </div>
      @include('layouts.pagination')
    </main>
    {{-- footer --}}

    <script src="{{ asset("assets/js/navbar.js") }}"></script>
  </div>
</x-guest-layout>
