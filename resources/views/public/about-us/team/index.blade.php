<x-guest-layout>
    <div>
        <header>
            @include('public.components.navbar')
            <div class="relative flex h-screen flex-col items-center justify-center text-center font-semibold text-white overflow-hidden">
                
                <!-- Video sebagai latar belakang -->
                <video class="absolute inset-0 w-full h-full object-cover" autoplay loop muted playsinline>
                    <source src="{{ asset('assets/images/home/videoo.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <!-- Overlay hitam transparan -->
                <div class="absolute inset-0 bg-black/60 backdrop-blur-[2px]"></div>

                <!-- Konten di atas video -->
                <div class="relative z-10 mt-20 mx-6 sm:mx-16 lg:mx-40 flex flex-col justify-center items-center text-white">
                    <div class="text-2xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight drop-shadow-md">
                        <span class="typewriter block text-center max-w-[850px] leading-tight">
                            Center of Excellence Smart Tourism & Hospitality
                        </span>
                    </div>

                    <div class="pt-6">
                        <p class="text-sm sm:text-lg lg:text-xl text-gray-200 text-center max-w-[750px] font-normal leading-relaxed">
                            Center of Excellence Smart Tourism and Hospitality merupakan pusat unggulan di bidang pariwisata dan hospitality
                            yang berfokus pada riset, inovasi, bisnis, dan pengabdian kepada masyarakat.
                        </p>
                    </div>
                </div>
            </div>
        </header>

        <main class="flex flex-col items-center pb-24 bg-white">
            {{-- Sejarah / Ringkasan CoE --}}
            <div class="w-11/12 md:w-5/6 mx-auto pt-12 sm:pt-16 relative z-20">
                <div class="text-center">
                    <!-- Judul (Diturunkan ke area background putih) -->
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-gray-900 tracking-tight leading-tight mb-3">
                        Tim <span class="text-[#F6A11F]">CoE</span><br class="hidden sm:block" />
                        Smart Tourism & Hospitality
                    </h2>

                    <!-- Garis Dekoratif -->
                    <div class="mt-3 flex justify-center items-center gap-1.5">
                        <span class="inline-block w-12 h-[3px] bg-gray-300 rounded-full"></span>
                        <span class="inline-block w-8 h-[3px] bg-[#F6A11F] rounded-full"></span>
                        <span class="inline-block w-12 h-[3px] bg-gray-300 rounded-full"></span>
                    </div>

                    <!-- Card Deskripsi utama -->
                    <div class="mt-8 bg-white rounded-3xl sm:rounded-[36px] shadow-xl border border-gray-100 p-8 sm:p-12 lg:p-16 transform transition-all duration-300 hover:shadow-2xl group">
                        <!-- Logo -->
                        <div class="mb-6 flex justify-center">
                            <div class="p-3 bg-amber-50 rounded-2xl border border-amber-100/80 shadow-sm transition duration-300 group-hover:scale-105">
                                <img src="{{ asset('assets/images/home/logo.png') }}"
                                    alt="Logo CoE"
                                    class="h-16 w-16 md:h-20 md:w-20 object-contain" />
                            </div>
                        </div>

                        <!-- Deskripsi -->
                        <p class="text-sm md:text-base lg:text-lg font-normal leading-relaxed max-w-4xl mx-auto text-gray-700 text-center">
                            Tim kami terdiri dari dosen-dosen dan mahasiswa yang memiliki semangat luar biasa dan dedikasi tinggi untuk
                            terus berinovasi, terutama dalam mendukung pengembangan sektor pariwisata dan perhotelan. Kami berkomitmen
                            untuk menghadirkan ide-ide kreatif serta solusi-solusi yang relevan guna memajukan industri ini melalui
                            kolaborasi dan pemanfaatan teknologi terdepan yang dipelajari selama masa pendidikan kami.
                        </p>
                    </div>
                </div>

                {{-- Filter Tab Navigasi --}}
                <div class="mt-14 mb-8 flex justify-center">
                    <div class="inline-flex p-1.5 bg-white rounded-full border border-gray-200 shadow-md">
                        @foreach ($member_options as $option)
                            <a href="{{ route('team.index', ['type' => $option['type']]) }}"
                                class="px-5 py-2.5 rounded-full text-xs sm:text-sm font-bold transition-all duration-300 {{ $member_type == $option['type'] ? 'bg-gradient-to-r from-[#FF8A00] to-[#E07B00] text-white shadow-md scale-105' : 'text-gray-600 hover:text-black hover:bg-gray-100' }}">
                                {{ $option['name'] }}
                            </a>
                        @endforeach
                    </div>
                </div>

                {{-- Wrapper Card Container Utama --}}
                <div class="relative bg-gradient-to-br from-[#1E88E5] via-[#1665C0] to-[#0D47A1] rounded-[28px] sm:rounded-[36px] shadow-2xl p-6 sm:p-10 lg:p-14 border border-white/20 overflow-hidden">
                    
                    <!-- Decorative Background Glow -->
                    <div class="absolute -top-24 -left-24 w-72 h-72 bg-blue-400/20 rounded-full blur-3xl pointer-events-none"></div>
                    <div class="absolute -bottom-24 -right-24 w-72 h-72 bg-amber-400/10 rounded-full blur-3xl pointer-events-none"></div>

                    <div class="relative z-10">
                        <!-- Judul Tipe Tim -->
                        <div class="text-center mb-10">
                            <span class="inline-block px-4 py-1.5 bg-white/10 backdrop-blur-md rounded-full text-xs font-bold text-amber-300 tracking-wider uppercase border border-white/15 shadow-inner">
                                Kategori Anggota
                            </span>
                            <h3 class="text-2xl sm:text-3xl font-extrabold text-white tracking-wide uppercase mt-2 drop-shadow-sm">
                                {{ $member_type }}
                            </h3>
                        </div>

                        {{-- Section Ketua (Leader) --}}
                        @if ($member_type == 'internal')
                            @foreach ($members as $member)
                                @if ($member->is_leader == 1)
                                    <div class="flex flex-col items-center justify-center mb-12">
                                        <div class="mb-3">
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-gradient-to-r from-amber-400 to-amber-500 text-white text-xs font-bold rounded-full shadow-lg border border-amber-300/50">
                                                <svg class="w-3.5 h-3.5 fill-current text-white" viewBox="0 0 24 24"><path d="M12 2l2.4 7.4h7.6l-6.2 4.5 2.4 7.4-6.2-4.5-6.2 4.5 2.4-7.4-6.2-4.5h7.6z"/></svg>
                                                Ketua Tim
                                            </span>
                                        </div>
                                        <a href="{{ route('profile.index', ['memberId' => $member->id]) }}"
                                           class="group relative w-36 md:w-44 lg:w-52 aspect-square rounded-2xl overflow-hidden border-2 border-amber-400 shadow-2xl hover:scale-105 transition-all duration-300 ring-4 ring-amber-400/20">
                                            <img src="{{ $member->photo_url }}" alt="{{ $member->name }}" class="w-full h-full object-cover object-center transform-gpu will-change-transform group-hover:scale-110 transition-transform duration-500">
                                            <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/15 to-transparent opacity-60 group-hover:opacity-85 transition-opacity duration-300"></div>
                                            <div class="absolute bottom-0 inset-x-0 p-3 text-center z-10">
                                                <h4 class="font-bold text-xs sm:text-sm md:text-base text-white group-hover:text-amber-300 transition-colors truncate">{{ $member->name }}</h4>
                                                <p class="text-[10px] sm:text-xs text-amber-200 font-medium mt-0.5 leading-tight line-clamp-2">{{ $member->position }}</p>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        @endif

                        {{-- Section Anggota (Grid Card Member) --}}
                        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6 lg:gap-8 justify-items-center items-center mx-auto">
                            @foreach ($members as $member)
                                @if ($member_type != 'internal' || ($member_type == 'internal' && $member->is_leader == 0))
                                    <a @if ($member_type == 'internal') href="{{ route('profile.index', ['memberId' => $member->id]) }}" @endif
                                       class="group relative h-[160px] w-[160px] md:h-[200px] md:w-[200px] overflow-hidden rounded-[14px] bg-gray-900 border border-white/20 shadow-lg hover:shadow-2xl hover:border-amber-300/60 hover:scale-105 transition-all duration-300 cursor-pointer">
                                        
                                        <!-- Gambar Profil -->
                                        <img src="{{ $member->photo_url }}" alt="{{ $member->name }}" 
                                             class="absolute inset-0 h-full w-full object-cover object-center transform-gpu will-change-transform group-hover:scale-110 transition-transform duration-500" />
                                        
                                        <!-- Overlay Gradient Kecerahan -->
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/15 to-transparent opacity-60 group-hover:opacity-85 transition-opacity duration-300"></div>
                                        
                                        <!-- Teks Nama & Posisi -->
                                        <div class="absolute bottom-0 inset-x-0 p-3 md:p-4 text-left z-10">
                                            <h4 class="font-semibold text-xs md:text-sm text-white group-hover:text-amber-300 transition-colors truncate">
                                                {{ $member->name }}
                                            </h4>
                                            <p class="text-[10px] md:text-xs text-pink-300 font-medium mt-0.5 leading-tight line-clamp-2">
                                                {{ $member->position }}
                                            </p>
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                        </div>

                    </div>
                </div>

            </div>
        </main>

        <!-- JavaScript -->
        <script src="{{ asset('assets/js/navbar.js') }}"></script>
    </div>
</x-guest-layout>