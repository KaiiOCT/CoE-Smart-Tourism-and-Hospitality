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
                  src="/assets/images/program/ImgKerjaSama.png"
                  alt="img"
                  class="absolute -z-10 h-full w-full"
                />

                <!-- Overlay hitam transparan -->
                <div class="absolute inset-0 bg-black opacity-50"></div>

                <div class="relative z-10">
                  <h1 class="text-center text-2xl font-bold md:text-5xl">
                    Kerja Sama
                  </h1>
                  <h1 class="text-center font-extralight italic md:text-4xl">
                    Center of Excellent Smart Tourism & Hospitality
                  </h1>
                </div>
              </div>
            </div>
          </div>
        </header>
        <main class="mt-24 flex flex-col items-center md:mt-[252px]">
          <div
            class="mb-5 grid w-11/12 grid-cols-3 gap-5 pb-5 md:w-5/6 md:grid-cols-5"
          >
            @foreach ($partners as $partner)
              <div class="text-center">
                <img
                  src="{{ asset('storage/' . $partner->photo) }}"
                  alt="img"
                  class="mx-auto h-[110px] min-h-[110px] w-[110px] min-w-[110px]"
                />
                <p class="font-medium">{{ $partner->name }}</p>
                <p class="font-medium text-[#5D5D5D]">{{ $partner->program }}</p>
              </div>
            @endforeach
          </div>
        </main>
        <main class="flex flex-col items-center bg-gray-100 py-5">
          <div class="mb-5 w-11/12 pb-5 md:w-5/6">
            <h1 class="mb-5 text-center text-lg font-bold underline md:text-xl">
              SCOPE OBBJECT<br> CoE SMART TOURISM & HOSPITALITY
            </h1>
            <img
              src="{{ asset("assets/images/imgScope.png") }}"
              alt=""
              class="mx-auto w-full md:w-auto"
              srcset=""
            />
          </div>
        </main>
        <!-- JavaScript -->
        <script src="{{ asset("assets/js/navbar.js") }}"></script>
      </div>

</x-guest-layout>
