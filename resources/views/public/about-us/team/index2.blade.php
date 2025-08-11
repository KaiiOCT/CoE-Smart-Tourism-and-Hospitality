<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anggota Tim</title>
    <style>
    #typingText::after, #typingText2::after {
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
        {{-- Navbar --}}
        @include('public.components.navbar')

        <script>
        const text1 = "Center of Excellence";
        const text2 = "Smart Tourism & Hospitality";

        let i = 0;
        let j = 0;

        function typeText1() {
            if (i < text1.length) {
                document.getElementById("typingText").innerHTML += text1.charAt(i);
                i++;
                setTimeout(typeText1, 100);
            } else {
                setTimeout(typeText2, 500);
            }
        }

        function typeText2() {
            if (j < text2.length) {
                document.getElementById("typingText2").innerHTML += text2.charAt(j);
                j++;
                setTimeout(typeText2, 100);
            }
        }

        window.addEventListener('DOMContentLoaded', typeText1);
        </script>

       <!-- Header Section dengan Video Fullscreen dan Efek Ketik -->
        <header class="relative h-screen w-full overflow-hidden text-white">
            <!-- Video sebagai latar belakang -->
            <video autoplay loop muted playsinline class="absolute inset-0 w-full h-full object-cover">
                <source src="{{ asset('assets/images/home/videoo.mp4') }}" type="video/mp4" />
                Your browser does not support the video tag.
            </video>

            <!-- Overlay gelap -->
            <div class="absolute inset-0 bg-black opacity-50 z-0"></div>

            <!-- Konten di atas video -->
            <div class="relative z-10 flex flex-col justify-center items-center h-full px-6 sm:px-12 lg:px-40 text-center">
                <!-- Judul dengan efek ketik -->
                <h1 id="typingText" class="font-bold text-[26px] sm:text-[33px] lg:text-4xl whitespace-nowrap"></h1>
                <h2 id="typingText2" class="font-bold text-[26px] sm:text-[33px] lg:text-[40px] mt-2 whitespace-nowrap"></h2>

                <!-- Deskripsi -->
                <p class="mt-6 text-[15px] sm:text-lg lg:text-xl text-[#bbbbbb] max-w-3xl font-normal">
                    Center of Excellence Smart Tourism and Hospitality merupakan pusat unggulan di bidang pariwisata dan hospitality
                    yang berfokus pada riset, inovasi, bisnis, dan pengabdian kepada masyarakat.
                </p>
            </div>
        </header>

        {{-- Deskripsi Tim --}}
        <section class="px-6 sm:px-12 lg:px-28 py-16 bg-white">
            <div class="text-center">
                <h2 class="text-2xl sm:text-4xl lg:text-5xl font-bold text-gray-800">
                    Tim CoE Smart Tourism & Hospitality
                </h2>
            </div>

            <!-- Container Deskripsi -->
            <div class="mt-12 flex justify-center">
                <div class="w-full max-w-5xl rounded-[30px] md:rounded-[50px] bg-[#EEEEEE] shadow-lg p-6 sm:p-10">
                    <p class="text-base sm:text-lg lg:text-xl font-light text-justify text-gray-700 leading-relaxed">
                        Tim kami terdiri dari dosen-dosen dan mahasiswa yang memiliki semangat luar biasa dan dedikasi tinggi
                        untuk terus berinovasi, terutama dalam mendukung pengembangan sektor pariwisata dan perhotelan. Kami
                        berkomitmen untuk menghadirkan ide-ide kreatif serta solusi-solusi yang relevan guna memajukan
                        industri ini melalui kolaborasi dan pemanfaatan teknologi terdepan.
                    </p>
                </div>
            </div>
        </section>

        {{-- Tab Pilihan Tim --}}
        <section class="w-full pt-10 pb-28 font-arial">
            <div class="px-5 md:px-10 lg:px-28">
                <div class="mx-auto mb-10 border-t border-[#A9A9A9]"></div>

                <p class="text-center text-xl md:text-2xl font-semibold mb-6">Tim Magang Kami</p>

                <nav class="mx-auto my-10 w-fit rounded-3xl border border-gray-500 px-10 py-3">
                    <ol class="flex font-semibold max-md:justify-between max-md:px-5 md:text-lg">
                        @foreach ($member_options as $index => $option)
                            <li class="{{ $member_type == $option['type'] ? 'text-orange1' : 'text-dark' }}">
                                <a href="{{ route('team.index', ['type' => $option['type']]) }}">
                                    {{ $option['name'] }}
                                </a>
                            </li>
                            @if (!$loop->last)
                                <span class="mx-4 h-7 w-[1px] bg-black"></span>
                            @endif
                        @endforeach
                    </ol>
                </nav>

                {{-- Daftar Anggota --}}
                <div class="bg-gradient-to-b from-[#2593CF] from-85% to-[#134B69] to-100% rounded-[20px] sm:rounded-[30px] lg:rounded-[40px] shadow-2xl pt-10 pb-16 px-4 md:px-10 lg:px-20">
                    <p class="text-xl md:text-2xl font-bold text-white text-center">
                        @foreach ($member_options as $option)
                            @if ($option['type'] == $member_type)
                                {{ $option['name'] }}
                            @endif
                        @endforeach
                    </p>

                    <div class="flex flex-wrap justify-center gap-8 pt-10">
                        @foreach ($members as $member)
                            <a
                                @if ($member_type == 'internal') href="{{ route('profile.index', ['memberId' => $member->id]) }}" @endif
                                class="relative h-[160px] w-[160px] md:h-[200px] md:w-[200px] overflow-hidden rounded-[10px] hover:scale-105 duration-500 cursor-pointer">
                                
                                <img src="{{ $member->photo_url }}" alt="{{ $member->name }}"
                                    class="absolute h-full w-full object-cover bg-gray-300" />
                                
                                <div class="absolute bottom-0 left-0 right-0 h-1/2 bg-gradient-to-t from-black opacity-70"></div>

                                <div class="absolute bottom-0 w-full text-[9px] md:text-sm lg:text-sm px-2 py-5">
                                    <p class="font-semibold text-white"> {{ $member->name }}</p>
                                    <p class="text-red-600 pt-1">{{ $member->position }} </p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        {{-- Script untuk navbar jika diperlukan --}}
        <script src="{{ asset('assets/js/navbar.js') }}"></script>
    </div>
</x-guest-layout>
</body>
</html>
