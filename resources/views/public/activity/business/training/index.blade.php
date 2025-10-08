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
                        ArsyGo
                    </span>
                </div>
            </div>
            </div>
        </header>

        <main class="flex flex-col items-center pt-[120px] bg-white">
            <div class="relative w-11/12 md:w-5/6">

                <!-- Logo / Header -->
                <div class="mb-8 flex justify-center">
                    <img src="{{ asset('assets/images/activity/Arsygo.png') }}" alt="Arsygo" class="max-h-20">
                </div>

                @foreach ($trainings as $training)
                    <!-- Card Artikel -->
                    <article 
                        wire:key="training-{{ $training->id }}" 
                        class="mb-6 overflow-hidden rounded-lg border border-gray-200 shadow-md hover:shadow-lg transition-shadow duration-300"
                    >
                        <div class="flex flex-col md:flex-row">
                            
                            <!-- Gambar -->
                            <div class="md:w-1/3">
                                <img 
                                    src="{{ asset('storage/' . $training->photo) }}" 
                                    alt="{{ $training->title }}" 
                                    class="h-56 w-full object-cover md:h-full"
                                >
                            </div>

                            <!-- Konten Artikel -->
                            <div class="flex flex-col justify-between p-5 md:w-2/3">
                                <header>
                                    <!-- Judul -->
                                    <h2 class="text-2xl font-semibold text-gray-800 hover:text-blue-700 transition-colors duration-200">
                                        {{ $training->title }}
                                    </h2>

                                    <!-- Info tanggal & lokasi -->
                                    <div class="mt-3 flex flex-wrap items-center gap-4 text-sm text-gray-600">
                                        <!-- Tanggal -->
                                        <div class="flex items-center">
                                            <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" stroke-width="2"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 
                                                    2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            {{ date("d F Y", strtotime($training->date)) }}
                                        </div>

                                        <!-- Lokasi -->
                                        <div class="flex items-center">
                                            <svg class="h-5 w-5 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 
                                                    18.9l-4.95-4.95a7 7 0 010-9.9zM10 
                                                    11a2 2 0 100-4 2 2 0 000 4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            {{ $training->location }}
                                        </div>

                                        <!-- Jenis -->
                                        <div class="flex items-center">
                                            <img src="{{ asset('assets/images/activity/key.png') }}" alt="icon" class="h-4 mr-1">
                                            {{ $training->type }}
                                        </div>
                                    </div>
                                </header>

                                <!-- Deskripsi -->
                                <p class="mt-4 text-gray-700 text-justify line-clamp-3">
                                    {{ $training->description }}
                                </p>

                                <!-- Tombol Selengkapnya -->
                                <div class="mt-4">
                                    <a href="#" 
                                      class="inline-block rounded-md bg-blue-50 px-4 py-2 text-sm font-medium text-blue-700 hover:bg-blue-100 transition">
                                        Selengkapnya
                                    </a>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            @include('layouts.pagination')
        </main>

      </div>
    </x-guest-layout>
