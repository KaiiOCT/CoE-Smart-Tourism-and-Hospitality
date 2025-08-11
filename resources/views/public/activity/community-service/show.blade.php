<x-guest-layout>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/css/slide.css') }}" />
    @endpush
    <main class="flex min-h-[100vh] flex-col items-center pt-[100px]">
        <div class="w-11/12 md:mt-10 md:w-5/6">
            <h1 class="mb-3 text-2xl font-semibold md:mb-5 md:text-4xl">
                {{ $community_service->title }}
            </h1>
            {{-- images slide --}}
            <div class="h-[400px] w-full md:h-[600px] md:w-full">
                <div class="h-[80%]">
                    <img id="main-image" src="" alt="img"
                        class="h-full w-full bg-gray-300 opacity-0 transition-opacity duration-1000 ease-in-out" />
                </div>
                <div class="mt-5 flex h-[20%] gap-1 overflow-y-hidden overflow-x-scroll py-1 scrollbar-none">
                    @foreach ($community_service->photos as $photo)
                        <img class="thumbnail h-[100%] w-[160px] cursor-pointer bg-gray-300 transition duration-500 hover:scale-110"
                            src="{{ asset('storage/' . $photo->photo) }}" alt="img" />
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Read News --}}
        <div class="my-5 w-11/12 md:w-5/6">
            {{-- paragraf 1 --}}
            <div>
                <h2 class="mb-3 text-xl font-semibold">Pengenalan</h2>
                <p class="text-justify">{{ $community_service->description }}</p>
            </div>
            {{-- paragraf 2 --}}
            <div class="mt-5">
                <h2 class="mb-3 text-xl font-semibold">
                    Apa saja yang kami kerjakan :
                </h2>
                <div>
                    {!! nl2br(e($community_service->jobs)) !!}
                </div>
            </div>
        </div>

        {{-- dukungan mitra --}}
        <div class="my-10 flex w-11/12 flex-col items-center md:w-5/6">
            <h5 class="mb-3 text-2xl font-semibold">Mitra dan Dukungan :</h5>
            <div class="flex flex-wrap justify-center">
                @foreach ($community_service->mitra_logos as $mitra)
                    <img src="{{ asset('storage/' . $mitra->logo) }}" alt="Mitra Logo"
                        class="mx-4 h-[70px] w-[70px] md:h-[100px] md:w-[100px]" />
                @endforeach
            </div>
        </div>
    </main>
    <!-- JavaScript -->
    <script src="{{ asset('assets/js/navbar.js') }}"></script>
    <script src="{{ asset('assets/js/imageSlide.js') }}"></script>
</x-guest-layout>
