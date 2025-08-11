<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sejarah</title>

    <!-- Typing effect CSS -->
    <style>
        #typingText::after, #typingTextDesc::after {
            content: '|';
            animation: blink 1s infinite;
        }

        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }
    </style>
</head>
<body>
<x-guest-layout>
    <div class="font-arial">
        @include('public.components.navbar')

        <!-- HEADER dengan VIDEO background -->
        <header>
            <div class="align-items-center relative flex h-screen flex-col items-center justify-center bg-cover bg-fixed bg-no-repeat text-center font-semibold text-white">
                <!-- Video sebagai latar belakang -->
                <video class="absolute inset-0 w-full h-full object-cover" autoplay loop muted playsinline>
                    <source src="{{ asset('assets/images/home/videoo.mp4') }}" type="video/mp4">
                </video>

                <!-- Overlay hitam transparan -->
                <div class="absolute inset-0 bg-black opacity-50"></div>

                <!-- Konten di atas background dan overlay -->
                <div class="relative text-center text-white flex flex-col justify-center mt-48 mx-11 sm:mx-30 lg:mx-40 h-full">
                    <div class="font-bold text-white text-[26px] sm:text-[33px] lg:text-4xl" id="typingText"></div>

                    <div class="pt-5">
                        <p id="typingTextDesc" class="text-[15px] sm:text-lg lg:text-xl text-[#bbbbbb]"></p>
                    </div>
                </div>
            </div>
        </header>

        <br><br><br>

        <!-- SECTION: Tentang CoE Smart Tourism & Hospitality -->
        <section class="px-5 sm:px-8 lg:px-28 py-20 bg-[#F9F9F9] font-sans">
            <!-- HEADER -->
            <div class="text-center mb-20">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-800 leading-tight mb-4">
                    Tentang <span class="text-[#F6A11F]">CoE</span><br class="hidden sm:block" />
                    Smart Tourism & Hospitality
                </h2>
                <!-- GARIS DEKORATIF -->
                <div class="flex justify-center">
                    <span class="inline-block w-16 h-[2px] bg-gray-300"></span>
                    <span class="inline-block w-6 h-[2px] bg-[#F6A11F] mx-1"></span>
                    <span class="inline-block w-16 h-[2px] bg-gray-300"></span>
                </div>
                <p class="mt-5 text-sm sm:text-base text-gray-600 max-w-2xl mx-auto">
                    Membangun inovasi, riset, dan kolaborasi teknologi untuk masa depan pariwisata cerdas dan berkelanjutan.
                </p>
            </div>

            <!-- KONTEN UTAMA -->
            <div class="space-y-20">

                <!-- Sejarah Singkat -->
                <div class="max-w-5xl mx-auto">
                    <div class="bg-white border border-gray-200 p-6 md:p-10 rounded-3xl shadow-xl text-gray-700 text-base sm:text-lg leading-relaxed text-justify transition-all duration-300 transform hover:scale-[1.02] hover:shadow-2xl">
                        <div class="flex justify-center mb-6">
                            <img src="{{ asset('assets/icons/request.png') }}" alt="Sejarah Icon" class="w-16 h-16 sm:w-20 sm:h-20">
                        </div>
                        <p class="mb-4">
                            <strong>Center of Excellence (CoE) Smart Tourism & Hospitality</strong> didirikan pada bulan <strong>Maret 2024</strong> di bawah naungan <strong>Universitas Telkom</strong>. CoE ini menjadi unit strategis yang berfokus pada pengembangan <em>riset, inovasi, kewirausahaan</em>, dan <em>pengabdian masyarakat</em> dalam sektor pariwisata dan hospitality berbasis teknologi digital.
                        </p>
                        <p>
                            Dengan pendekatan kolaboratif lintas sektor, CoE membangun sinergi antara <strong>akademisi, industri, pemerintah</strong>, dan <strong>masyarakat</strong>. Tujuannya adalah menciptakan solusi inovatif dan kajian strategis yang berdampak nyata, baik di tingkat <em>nasional</em> maupun <em>global</em>, demi kemajuan pariwisata dan perhotelan yang berkelanjutan.
                        </p>
                    </div>
                </div>

                <!-- VISI -->
                <div class="max-w-5xl mx-auto">
                    <div class="bg-white border border-gray-200 p-6 md:p-10 rounded-3xl shadow-xl text-gray-700 text-base sm:text-lg leading-relaxed text-justify transition-all duration-300 transform hover:scale-[1.02] hover:shadow-2xl">
                        <div class="flex justify-center mb-6">
                            <img src="{{ asset('assets/icons/vision.png') }}" alt="Visi Icon" class="w-16 h-16 sm:w-20 sm:h-20">
                        </div>
                        <h3 class="text-2xl sm:text-3xl md:text-4xl font-bold text-[#2593CF] text-center mb-4">Visi</h3>
                        <p>
                            Menjadi pusat unggulan riset, inovasi, bisnis dan pengabdian masyarakat bidang pariwisata dan hospitality berlandaskan entrepreneurship dengan berbasis teknologi informasi dan komunikasi di tahun 2028.
                        </p>
                    </div>
                </div>

                <!-- MISI -->
                <div class="max-w-5xl mx-auto">
                    <div class="bg-white border border-gray-200 p-6 md:p-10 rounded-3xl shadow-xl text-gray-700 text-base sm:text-lg leading-relaxed text-justify transition-all duration-300 transform hover:scale-[1.02] hover:shadow-2xl">
                        <div class="flex justify-center mb-6">
                            <img src="{{ asset('assets/icons/idea.png') }}" alt="Misi Icon" class="w-16 h-16 sm:w-20 sm:h-20">
                        </div>
                        <h3 class="text-2xl sm:text-3xl md:text-4xl font-bold text-[#2593CF] text-center mb-4">Misi</h3>
                        <p>
                            Melaksanakan riset, inovasi, bisnis, dan pengabdian masyarakat serta pengembangan SDM di bidang pariwisata dan hospitality berbasis digital, melalui kolaborasi lintas sektor untuk mendorong pariwisata berkelanjutan di Indonesia.
                        </p>
                    </div>
                </div>

            </div>
        </section>

    </div>
</x-guest-layout>

<!-- Typing effect JS -->
<script>
    const titleText = "Center of Excellence\nSmart Tourism & Hospitality";
    const descText = "Center of Excellence Smart Tourism and Hospitality merupakan pusat unggulan di bidang pariwisata dan hospitality yang berfokus pada riset, inovasi, bisnis, dan pengabdian kepada masyarakat.";

    let titleIndex = 0;
    let descIndex = 0;

    const typingTitle = () => {
        if (titleIndex < titleText.length) {
            const char = titleText.charAt(titleIndex);
            document.getElementById("typingText").innerHTML += (char === "\n") ? "<br>" : char;
            titleIndex++;
            setTimeout(typingTitle, 60);
        } else {
            setTimeout(typingDesc, 300);
        }
    };

    const typingDesc = () => {
        if (descIndex < descText.length) {
            document.getElementById("typingTextDesc").innerHTML += descText.charAt(descIndex);
            descIndex++;
            setTimeout(typingDesc, 30);
        }
    };

    window.addEventListener("DOMContentLoaded", typingTitle);
</script>
</body>
</html>
