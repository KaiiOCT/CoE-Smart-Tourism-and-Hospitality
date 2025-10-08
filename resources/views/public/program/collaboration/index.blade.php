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
                        Kerja Sama
                    </span>
                </div>

                <div class="pt-5">
                    <p class="text-[15px] sm:text-lg lg:text-xl text-[#bbbbbb] text-center">
                        Kerja sama dan kolaborasi menjadi landasan penting dalam memperkuat sinergi antara lembaga, industri, dan masyarakat. 
                        Melalui kemitraan yang saling menguntungkan, kami berupaya menciptakan peluang, berbagi sumber daya, 
                        dan menghasilkan inovasi yang berdampak positif bagi semua pihak
                    </p>
                </div>
            </div>
            </div>
        </header>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <!-- HEADER -->
        <div class="text-center mb-8">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-800 leading-tight mb-4">
                Kerja Sama  <span class="text-[#F6A11F]">CoE</span><br class="hidden sm:block" />
                Smart Tourism & Hospitality
            </h2>
            <!-- GARIS DEKORATIF -->
            <div class="flex justify-center">
                <span class="inline-block w-16 h-[2px] bg-gray-300"></span>
                <span class="inline-block w-6 h-[2px] bg-[#F6A11F] mx-1"></span>
                <span class="inline-block w-16 h-[2px] bg-gray-300"></span>
            </div>
        </div>

        <main class="mt-6 flex flex-col items-center md:mt-10">
            <div
                class="mb-5 grid w-11/12 grid-cols-3 gap-5 pb-5 md:w-5/6 md:grid-cols-5"
            >
                @foreach ($partners as $partner)
                    <div class="text-center">
                        <img
                            src="{{ asset('storage/' . $partner->photo) }}"
                            alt="img"
                            class="mx-auto h-[140px] min-h-[140px] w-[140px] min-w-[140px]"
                        />
                        <p class="font-medium">{{ $partner->name }}</p>
                        <p class="font-medium text-[#5D5D5D]">{{ $partner->program }}</p>
                    </div>
                @endforeach
            </div>
        </main>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <main class="flex flex-col items-center bg-white py-10">
          <div class="text-center mb-6">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-800 leading-tight mb-3">
              Scope Object <span class="text-[#F6A11F]">CoE</span><br class="hidden sm:block" />
              Smart Tourism & Hospitality
            </h2>
            <!-- GARIS DEKORATIF -->
            <div class="flex justify-center">
              <span class="inline-block w-16 h-[2px] bg-gray-300"></span>
              <span class="inline-block w-6 h-[2px] bg-[#F6A11F] mx-1"></span>
              <span class="inline-block w-16 h-[2px] bg-gray-300"></span>
            </div>
          </div>

          <!-- Gambar elegan -->
          <div class="mt-6 bg-white p-4 rounded-xl shadow-xl border border-gray-200 hover:shadow-2xl transition duration-300">
            <img
              src="{{ asset('assets/images/tabel 1.png') }}"
              alt="Scope Object"
              class="mx-auto max-w-full md:max-w-4xl rounded-lg"
            />
          </div>
        </main>

        
        <!-- JavaScript -->
        <script src="{{ asset("assets/js/navbar.js") }}"></script>
      </div>

</x-guest-layout>
