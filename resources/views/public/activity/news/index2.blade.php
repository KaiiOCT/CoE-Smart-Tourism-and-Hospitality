<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<x-guest-layout>
    <div class="font-arial">
        @include('public.components.navbar')

        <section class="relative pt-28 m-auto">
        <div class="absolute w-full bg-biru-sth h-[230px] lg:h-[340px] top-0 left-0 -z-10"></div>

        <div class="relative w-full h-52 md:h-[300px] lg:h-[446px] px-5 lg:px-28 mx-auto">
            <img src="{{ asset('assets/images/activity/artikel-2.png') }}" alt="artikel"
                class="w-full h-full object-cover rounded-[20px] md:rounded-[30px] lg:rounded-[40px]">

            <div class="absolute top-4 left-10 md:left-10 lg:left-40 bg-biru-sth w-24 md:w-28 lg:w-36 h-6 md:h-7 lg:h-8 text-center content-center rounded-md md:rounded-md lg:rounded-lg text-white font-semibold text-[10px] md:text-xs lg:text-base">
                <p>Berita Terkini</p>
            </div>
            <div class="flex justify-between">
                     
            <div class="absolute text-white left-10 md:left-10 lg:left-40 bottom-5 md:bottom-10 lg:bottom-10 space-y-3">
                <div class="flex gap-1 items-center bg-[#D9D9D9] bg-opacity-25 w-[105px] md:w-[140px] lg:w-[154px] h-[20px] md:h-[30px] lg:h-[35px] rounded-md md:rounded-lg lg:rounded-xl">
                    <img class="w-4 md:lg:w-6" src="{{ asset('assets/images/activity/calender.svg') }}" alt="">
                    <p class="text-[8px] md:text-xs lg:text-xs font-semibold">21, December 2023</p>
                </div>
                <div class="mr-20 font-bold text-[8px] md:text-sm lg:text-base">
                    <p>Telkom University Luncurkan Teknologi</p>
                    <p>Ciptakan Video Hasil AI Mengangkat Sejarah Kasepuhan Cirebon</p>
                </div>
            </div>

            <div 
                class="absolute bg-biru-sth bg-opacity-50 w-20 md:w-28 lg:w-40 h-5 md:h-6 lg:h-8 flex gap-2 items-center justify-center rounded-lg text-[8px] md:text-xs lg:text-base text-white font-semibold font-lota1">
                <a href="https://www.pikiran-rakyat.com/teknologi/pr-017501013/telkom-university-luncurkan-teknologi-lotus-ciptakan-video-hasil-ai-mengangkat-sejarah-kasepuhan-cirebon?page=all" target="_blank">Selengkapnya</a>
                <img  class="hidden sm:hidden h-7" src="{{ asset('assets/arrow-ford.svg') }}">
            </div>
            </div>
           
        </div>
    </section>
    </div>
</x-guest-layout>
  
</body>
</html>