<x-guest-layout>
    <div>
        <header>
            @include('public.components.navbar')
            <div class="relative h-[30vh] w-full bg-[#2593CF] md:h-[45vh]">
                <div class="absolute left-[50%] top-[50%] h-[181px] w-11/12 -translate-x-[50%] md:top-[35%] md:h-[400px] md:w-5/6">
                    
                    <!-- Carousel Hero Container -->
                    <div id="hero-carousel" class="relative flex h-full w-full flex-col justify-center overflow-hidden rounded-[30px] text-white md:rounded-[50px] shadow-xl bg-gray-900">
                        
                        @if(isset($mainNewses) && count($mainNewses) > 0)
                            <!-- Slide Track -->
                            <div id="hero-track" class="flex h-full w-full transition-transform duration-700 ease-in-out">
                                @foreach ($mainNewses as $index => $item)
                                    <div class="relative h-full w-full flex-shrink-0 min-w-full">
                                        <!-- Background Image -->
                                        <img
                                            src="{{ asset('storage/' . $item->photo) }}"
                                            alt="{{ $item->title }}"
                                            class="absolute inset-0 h-full w-full object-cover"
                                        />
                                        
                                        <!-- Overlay Hitam Transparan Gradient -->
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-black/20"></div>
                                        
                                        <!-- Badge Berita Terkini -->
                                        <span class="absolute left-5 top-5 z-10 rounded-md bg-[#2593CF] px-2 py-1 max-md:text-xs md:rounded-xl md:px-5 md:py-1 font-semibold shadow-md">
                                            Berita Terkini
                                        </span>
                                        
                                        <!-- Info Tanggal & Judul -->
                                        <div class="absolute bottom-8 left-5 z-10 pr-20 md:bottom-12 md:left-10 md:pr-40">
                                            {{-- Date --}}
                                            <div class="mb-2 flex w-fit items-center rounded-3xl bg-slate-800/60 px-3 py-1 backdrop-blur-md md:px-5 md:py-2 border border-white/10">
                                                <svg
                                                    class="h-4 w-4 text-white md:h-5 md:w-5"
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
                                                        d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V17Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z"
                                                    />
                                                </svg>
                                                <span class="ms-2 text-xs md:text-sm font-medium">
                                                    {{ date("d F Y", strtotime($item->date)) }}
                                                </span>
                                            </div>

                                            {{-- Judul --}}
                                            <h5 class="line-clamp-2 w-full text-xs font-semibold sm:text-base md:text-xl lg:text-2xl leading-snug drop-shadow-md">
                                                {{ $item->title }}
                                            </h5>
                                        </div>

                                        {{-- Button Selengkapnya (Pengecekan Tipe Berita & Slug) --}}
                                        <a
                                            href="{{ ($item->type === 'internal' || !empty($item->slug)) ? route('sthnews.show', $item->slug) : $item->link }}"
                                            class="absolute bottom-4 right-4 z-10 flex items-center rounded-xl bg-[#2593CF] bg-opacity-90 hover:bg-opacity-100 transition px-3 py-1.5 md:bottom-10 md:right-10 md:px-5 md:py-2 shadow-lg hover:scale-105"
                                        >
                                            <span class="max-md:text-xs md:text-base font-medium">Selengkapnya</span>
                                            <svg
                                                class="h-4 w-4 md:h-[30px] md:w-[30px] ms-1"
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
                                @endforeach
                            </div>

                            <!-- Indicator Dots (Tampil Jika Berita Utama > 1) -->
                            @if (count($mainNewses) > 1)
                                <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex space-x-2 z-20">
                                    @foreach ($mainNewses as $index => $item)
                                        <button 
                                            type="button" 
                                            class="hero-dot h-2.5 w-2.5 rounded-full bg-white/50 transition-all duration-300"
                                            onclick="goToHeroSlide({{ $index }})"
                                        ></button>
                                    @endforeach
                                </div>
                            @endif
                        @else
                            <div class="flex items-center justify-center h-full text-white/70">
                                <p class="text-sm md:text-base">Belum ada berita utama yang dipublikasikan.</p>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </header>

        <main class="mt-24 flex flex-col items-center md:mt-[252px]">
            {{-- Navigasi Kategori --}}
            <div class="w-11/12 pb-10 md:w-5/6">
                <nav
                    class="rounded-2xl px-5 py-3 md:rounded-[30px] md:py-5 bg-white"
                    style="
                        box-shadow:
                            3px 4px 3px #00000062,
                            -1px -1px 2px rgba(0, 0, 0, 0.186);
                    "
                >
                    <ol class="flex font-semibold max-md:justify-between max-md:px-5 md:ps-5 md:text-lg overflow-x-auto">
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

            {{-- Item Daftar Berita --}}
            <div class="w-11/12 md:w-5/6">
                @foreach ($newses as $news)
                    <div
                        wire:key="news-{{ $news->id }}"
                        class="mb-5 flex max-md:flex-col md:mb-10 md:justify-between"
                    >
                        <div class="h-[200px] overflow-hidden rounded-t-3xl max-md:w-full md:w-[32%] md:rounded-3xl">
                            <img
                                src="{{ asset("storage/" . $news->photo) }}"
                                alt="{{ $news->title }}"
                                class="h-full w-full bg-gray-300 object-cover"
                            />
                        </div>
                        <div class="box-border flex flex-col justify-center overflow-hidden rounded-b-3xl p-5 shadow-customBox max-md:w-full max-md:pt-3 md:h-[200px] md:w-[67%] md:rounded-3xl rounded-[30px] border border-[#D9D9D9] bg-white">
                            {{-- Date & Category --}}
                            <div class="flex flex-wrap gap-2">
                                <div class="flex w-fit items-center rounded-md border border-[#D9D9D9] px-2 text-[#585757] md:px-3">
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
                                            d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V17Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z"
                                        />
                                    </svg>
                                    <span class="ms-3 text-sm max-md:text-xs">
                                        {{ date("d F Y", strtotime($news->date)) }}
                                    </span>
                                </div>
                                <div class="w-fit rounded-md border border-[#D9D9D9] px-2 py-1 text-[#585757] md:px-8">
                                    <span class="text-sm">&bull; {{ $news->category->name }}</span>
                                </div>
                            </div>

                            {{-- Judul Berita dengan Fallback Routing --}}
                            <h5 class="line-clamp-1 text-lg font-semibold py-1">
                                <a href="{{ ($news->type === 'internal' || !empty($news->slug)) ? route('sthnews.show', $news->slug) : $news->link }}" class="hover:underline">
                                    {{ $news->title }}
                                </a>
                            </h5>
                            
                            <p class="line-clamp-2 text-base text-gray-600">{{ $news->description }}</p>

                            {{-- Link Selengkapnya dengan Fallback Routing --}}
                            <a href="{{ ($news->type === 'internal' || !empty($news->slug)) ? route('sthnews.show', $news->slug) : $news->link }}" class="text-lg font-medium text-[#2593CF] hover:underline">
                                <div class="flex items-center pt-4">
                                    <span>Selengkapnya</span>
                                    <svg
                                        class="h-[30px] w-[30px] pt-1 ms-1"
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
            
           @include('layouts.pagination', ['data' => $newses])
        </main>

        <!-- Script Slider Smooth Infinite Carousel -->
        <script src="{{ asset("assets/js/navbar.js") }}"></script>
        <script data-cfasync="false">
            document.addEventListener('DOMContentLoaded', function () {
                const heroTrack = document.getElementById('hero-track');
                const heroDots = document.querySelectorAll('.hero-dot');
                const heroContainer = document.getElementById('hero-carousel');
                
                if (!heroTrack) return;

                const slides = Array.from(heroTrack.children);
                const realTotal = slides.length;
                if (realTotal <= 1) return;

                // Kloning slide pertama dan letakkan di paling akhir untuk efek infinite loop
                const firstClone = slides[0].cloneNode(true);
                heroTrack.appendChild(firstClone);

                let currentIndex = 0;
                let isTransitioning = false;
                let heroInterval = null;
                let isHovered = false;

                let touchStartX = 0;
                let touchEndX = 0;
                const minSwipeDistance = 50;

                // Update posisi dot indikator secara sinkron
                function updateDots(index) {
                    const dotIndex = index % realTotal;
                    heroDots.forEach((dot, idx) => {
                        if (idx === dotIndex) {
                            dot.classList.add('bg-white', 'w-6');
                            dot.classList.remove('bg-white/50', 'w-2.5');
                        } else {
                            dot.classList.remove('bg-white', 'w-6');
                            dot.classList.add('bg-white/50', 'w-2.5');
                        }
                    });
                }

                // Pindahkan posisi slide
                function moveToSlide(index, animate = true) {
                    if (animate) {
                        heroTrack.style.transition = 'transform 700ms ease-in-out';
                    } else {
                        heroTrack.style.transition = 'none';
                    }
                    heroTrack.style.transform = `translateX(-${index * 100}%)`;
                    currentIndex = index;
                    updateDots(index);
                }

                function nextSlide() {
                    if (isTransitioning) return;
                    isTransitioning = true;
                    currentIndex++;
                    moveToSlide(currentIndex, true);
                }

                function prevSlide() {
                    if (isTransitioning) return;
                    isTransitioning = true;
                    if (currentIndex === 0) {
                        moveToSlide(realTotal, false);
                        heroTrack.offsetHeight; // Force DOM Reflow
                        currentIndex = realTotal - 1;
                        moveToSlide(currentIndex, true);
                    } else {
                        currentIndex--;
                        moveToSlide(currentIndex, true);
                    }
                }

                // Listener saat transisi animasi selesai
                heroTrack.addEventListener('transitionend', function () {
                    isTransitioning = false;
                    if (currentIndex === realTotal) {
                        moveToSlide(0, false);
                    }
                });

                function stopAuto() {
                    if (heroInterval) {
                        clearInterval(heroInterval);
                        heroInterval = null;
                    }
                }

                function startAuto() {
                    stopAuto();
                    if (!isHovered) {
                        heroInterval = setInterval(nextSlide, 4000);
                    }
                }

                // Global function untuk dot click
                window.goToHeroSlide = function (index) {
                    if (isTransitioning) return;
                    isTransitioning = true;
                    moveToSlide(index, true);
                    startAuto();
                };

                if (heroContainer) {
                    heroContainer.addEventListener('touchstart', function (e) {
                        touchStartX = e.changedTouches[0].screenX;
                        stopAuto();
                    }, { passive: true });

                    heroContainer.addEventListener('touchend', function (e) {
                        touchEndX = e.changedTouches[0].screenX;
                        handleSwipe();
                        startAuto();
                    }, { passive: true });

                    heroContainer.addEventListener('mouseenter', function () {
                        isHovered = true;
                        stopAuto();
                    });
                    
                    heroContainer.addEventListener('mouseleave', function () {
                        isHovered = false;
                        startAuto();
                    });
                }

                function handleSwipe() {
                    const distance = touchEndX - touchStartX;
                    if (distance < -minSwipeDistance) {
                        nextSlide();
                    } else if (distance > minSwipeDistance) {
                        prevSlide();
                    }
                }

                // Inisialisasi slider awal
                moveToSlide(0, false);
                startAuto();
            });
        </script>
    </div>
</x-guest-layout>