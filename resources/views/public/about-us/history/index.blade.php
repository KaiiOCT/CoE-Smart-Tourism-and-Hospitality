<x-guest-layout>
  <div>
   <header>
      @include('public.components.navbar')

      <!-- Hero Section dengan Video -->
      <div class="align-items-center relative flex h-screen flex-col items-center justify-center bg-cover bg-fixed bg-no-repeat text-center font-semibold text-white">
        <!-- Video sebagai latar belakang -->
        <video class="absolute inset-0 w-full h-full object-cover" autoplay loop muted playsinline>
          <source src="{{ asset('assets/images/home/videoo.mp4') }}" type="video/mp4">
        </video>

        <!-- Overlay hitam transparan -->
        <div class="absolute inset-0 bg-black opacity-50"></div>

        <!-- Konten di atas background dan overlay -->
        <div class="relative text-center text-white flex flex-col justify-center mt-48 mx-11 sm:mx-30 lg:mx-40 h-full">
          <div class="font-bold">
            <p class="text-[26px] sm:text-[33px] lg:text-4xl">Center of Excellence</p>
            <p class="text-[26px] sm:text-[33px] lg:text-[40px]">Smart Tourism & Hospitality</p>
          </div>
          <div class="pt-5">
            <p class="text-[15px] sm:text-lg lg:text-xl text-[#bbbbbb]">
              Center of Excellence Smart Tourism and Hospitality
              merupakan pusat unggulan di bidang pariwisata dan hospitality
              yang berfokus pada riset, inovasi, bisnis, dan pengabdian kepada masyarakat.
            </p>
          </div>
        </div>
      </div>
    </header>

    <main class="flex flex-col items-center">
      <!-- Sejarah COE -->
      <section class="px-5 sm:px-8 lg:px-28 pt-14 bg-white">
        <div class="text-center text-3xl sm:text-4xl lg:text-5xl font-bold font-lota2 mb-10 animate-fade-in">
          <p>Sejarah COE</p>
          <p>Smart Tourism & Hospitality</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-7 gap-8 items-center">
          <div class="lg:col-span-5 font-lota2 text-base sm:text-lg lg:text-xl text-justify leading-relaxed animate-slide-up">
            <p>
              CoE Smart Tourism and Hospitality didirikan pada bulan Maret 2024 sebagai salah satu unit strategis di Universitas Telkom. Unit ini dibentuk untuk mendukung kegiatan Research, Innovation, Business, and Community Service (RIBCS) di bidang pariwisata dan perhotelan berbasis teknologi digital.
            </p>
            <p class="mt-4">
              CoE ini berperan sebagai penghubung antara akademisi, pemerintah, industri, operator, dan pengguna jasa dalam menciptakan kajian akademik yang relevan serta berkontribusi dalam pengembangan sektor pariwisata yang berkelanjutan.
            </p>
          </div>

          <div class="lg:col-span-2 flex justify-center animate-zoom-in">
            <img class="w-[200px] sm:w-[220px] lg:w-[250px] h-auto" src="{{ asset('assets/images/aboutUs/logo.png') }}" alt="Logo COE">
          </div>
        </div>
      </section>

      <!-- Visi Misi -->
      <section class="px-4 sm:px-8 lg:px-28 pt-14 bg-white">
        <div class="border-t border-gray-300 mb-10"></div>

        <div class="text-center text-3xl sm:text-4xl lg:text-5xl font-lota2 font-semibold mb-10 animate-fade-in">
          <p>Visi dan Misi</p>
          <p>COE Smart Tourism & Hospitality</p>
        </div>

        <div class="flex flex-col lg:flex-row gap-8 text-white">
          <div class="flex-1 bg-gradient-to-br from-[#ff8a00] to-[#995300] p-10 rounded-2xl shadow-lg animate-slide-up">
            <h3 class="text-3xl sm:text-4xl lg:text-5xl font-lota2 font-semibold mb-6">Visi</h3>
            <p class="text-[16px] sm:text-[18px] font-semibold">
              Menjadi Research Center pariwisata dan hospitality unggul berbasis teknologi informasi dan komunikasi.
            </p>
          </div>

          <div class="flex-1 bg-gradient-to-br from-[#2593CF] to-[#134B69] p-10 rounded-2xl shadow-lg animate-slide-up">
            <h3 class="text-3xl sm:text-4xl lg:text-5xl font-lota2 font-semibold mb-6">Misi</h3>
            <ol class="list-decimal space-y-3 pl-6 text-[16px] sm:text-[18px] font-semibold">
              <li>Meningkatkan kualitas produk dan layanan pariwisata dan hospitality melalui digitalisasi, teknologi, dan inovasi terkini.</li>
              <li>Menjalin kerjasama dan kolaborasi lintas sektor demi memajukan sektor pariwisata Indonesia yang berkelanjutan.</li>
              <li>Memajukan SDM di bidang pariwisata dan hospitality melalui penelitian dan pelatihan.</li>
            </ol>
          </div>
        </div>
      </section>
    </main>

    <!-- Animasi tambahan -->
    <style>
      @keyframes fade-in {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
      }
      @keyframes slide-up {
        from { opacity: 0; transform: translateY(50px); }
        to { opacity: 1; transform: translateY(0); }
      }
      @keyframes zoom-in {
        from { opacity: 0; transform: scale(0.9); }
        to { opacity: 1; transform: scale(1); }
      }
      .animate-fade-in {
        animation: fade-in 1.2s ease-out both;
      }
      .animate-slide-up {
        animation: slide-up 1s ease-out both;
      }
      .animate-zoom-in {
        animation: zoom-in 1s ease-out both;
      }
    </style>

    <script src="{{ asset('assets/js/navbar.js') }}"></script>
  </div>
</x-guest-layout>
