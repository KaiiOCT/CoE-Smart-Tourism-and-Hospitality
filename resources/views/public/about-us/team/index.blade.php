<x-guest-layout>
    <div>
        <header>
            @include('public.components.navbar')
            <div class="relative h-[30vh] w-full bg-[#2593CF] md:h-[45vh]">
                <div
                    class="absolute left-[50%] top-[50%] h-[181px] w-11/12 -translate-x-[50%] md:top-[35%] md:h-[400px] md:w-5/6">
                    <div
                        class="relative flex h-full w-full flex-col justify-center overflow-hidden rounded-[30px] text-white md:rounded-[50px]">

                        <!-- VIDEO BACKGROUND -->
                        <video autoplay muted loop playsinline
                            class="absolute -z-10 h-full w-full object-cover rounded-[30px] md:rounded-[50px]">
                            <source src="{{ asset('assets/images/home/videoo.mp4') }}" type="video/mp4" />
                            Your browser does not support the video tag.
                        </video>

                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-black opacity-50 rounded-[30px] md:rounded-[50px]"></div>

                        <div class="relative z-10 text-center">
                            <h1 class="text-xl font-semibold md:text-5xl">
                                Center of Excellence
                            </h1>
                            <h1 class="text-xl font-semibold md:text-6xl">
                                Smart Tourism & Hospitality
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <main class="flex flex-col items-center">
        {{-- Sejarah COE --}}
        <div class="mt-28 w-11/12 pb-10 md:mt-[252px] md:w-5/6 mx-auto">
        <div class="mt-28 w-11/12 md:mt-[252px] md:w-5/6 mx-auto pb-10 text-center">
            <!-- Judul -->
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-800 leading-tight mb-4">
                Tim <span class="text-[#F6A11F]">CoE</span><br class="hidden sm:block" />
                Smart Tourism & Hospitality
            </h2>

            <!-- Garis Dekoratif -->
            <div class="mt-2 flex justify-center items-center">
                <span class="inline-block w-16 h-[2px] bg-gray-300"></span>
                <span class="inline-block w-6 h-[2px] bg-[#F6A11F] mx-1"></span>
                <span class="inline-block w-16 h-[2px] bg-gray-300"></span>
            </div>

            <!-- Container putih dengan efek hover -->
            <div
                class="mt-10 bg-white rounded-[20px] sm:rounded-[30px] lg:rounded-[40px] shadow-lg px-8 py-14 md:px-14 lg:px-24 transform transition-all duration-300 ease-in-out hover:scale-[1.015] hover:shadow-2xl group">

                <!-- Logo -->
                <div class="mb-8 flex justify-center">
                    <img src="{{ asset('assets/images/home/logo.png') }}"
                        alt="Logo CoE"
                        class="h-20 w-20 md:h-24 md:w-24 object-contain transition duration-300 group-hover:scale-110" />
                </div>

                <!-- Deskripsi -->
                <p class="text-base md:text-lg lg:text-xl font-normal leading-relaxed max-w-5xl mx-auto text-[#333] text-center">
                    Tim kami terdiri dari dosen-dosen dan mahasiswa yang memiliki semangat luar biasa dan dedikasi tinggi untuk
                    terus berinovasi, terutama dalam mendukung pengembangan sektor pariwisata dan perhotelan. Kami berkomitmen
                    untuk menghadirkan ide-ide kreatif serta solusi-solusi yang relevan guna memajukan industri ini melalui
                    kolaborasi dan pemanfaatan teknologi terdepan yang dipelajari selama masa pendidikan kami.
                </p>
            </div>
        </div>

            {{-- Tim Magang --}}
            <h5 class="mb-5 mt-10 text-center text-2xl font-semibold text-black">Tim Magang Kami</h5>
            <div class="flex justify-center">
                <div
                    class="flex items-center justify-around bg-white rounded-full w-full max-w-[640px] h-10 md:h-14 border border-[#5D5D5D] my-10 text-sm font-semibold text-black">
                    @foreach ($member_options as $index => $option)
                        <a href="{{ route('team.index', ['type' => $option['type']]) }}"
                            class="px-4 {{ $member_type == $option['type'] ? 'text-[#FF8A00] font-semibold' : '' }}">
                            {{ $option['name'] }}
                        </a>
                        @if (!$loop->last)
                            <div class="h-5 border-r border-black mx-2"></div>
                        @endif
                    @endforeach
                </div>
            </div>

            {{-- Wrapper Container --}}
            <div
                class="bg-gradient-to-b from-[#2593CF] from-85% to-[#134B69] to-100% rounded-[20px] sm:rounded-[30px] lg:rounded-[40px] shadow-2xl pt-10 pb-16 px-4 md:px-10 lg:px-20">
                <p class="text-xl md:text-2xl font-bold text-white text-center">
                    {{ strtoupper($member_type) }}
                </p>

                {{-- Ketua --}}
                @foreach ($members as $member)
                    @if ($member_type == 'internal' && $member->is_leader == 1)
                        <div class="relative flex flex-col items-center justify-center pt-8">
                            <div class="relative w-36 md:w-44 lg:w-52 mx-auto">
                                <img src="{{ $member->photo_url }}" alt="{{ $member->name }}" class="rounded-lg">
                                <div class="absolute inset-0 bg-gradient-to-b from-black/0 to-black/50 rounded-lg"></div>
                                <div class="absolute bottom-0 w-full text-[9px] md:text-[11px] lg:text-sm px-2 py-5">
                                    <p class="font-semibold text-white">{{ $member->name }}</p>
                                    <p class="text-pink-sth pt-1">{{ $member->position }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

                {{-- Anggota --}}
                <div
                    class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 pt-10 gap-y-5 md:gap-y-3 lg:gap-6 items-center mx-auto">
                    @foreach ($members as $member)
                        @if ($member_type != 'internal' || ($member_type == 'internal' && $member->is_leader == 0))
                            <a @if ($member_type == 'internal') href="{{ route('profile.index', ['memberId' => $member->id]) }}" @endif
                                class="relative h-[160px] w-[160px] overflow-hidden rounded-[10px] md:h-[200px] md:w-[200px] hover:scale-105 duration-500 cursor-pointer">
                                <img src="{{ $member->photo_url }}" alt="{{ $member->name }}"
                                    class="absolute h-full w-full object-cover" />
                                <div class="absolute bottom-0 left-0 right-0 h-1/2 bg-gradient-to-t from-black opacity-70"></div>
                                <div class="absolute bottom-0 w-full text-[9px] md:text-[11px] lg:text-sm px-2 py-5">
                                    <p class="font-semibold text-white">{{ $member->name }}</p>
                                    <p class="text-pink-sth pt-1">{{ $member->position }}</p>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        </main>

        <!-- JavaScript -->
        <script src="{{ asset('assets/js/navbar.js') }}"></script>
    </div>
</x-guest-layout>
