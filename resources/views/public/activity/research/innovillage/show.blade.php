@push("styles")
  <link rel="stylesheet" href="{{ asset("assets/css/slide.css") }}" />
@endpush
<x-guest-layout>
<div>
  <header>
    @include('public.components.navbar')
  </header>
  <main class="flex min-h-[100vh] flex-col items-center pt-[90px]">
    <div class="w-11/12 md:mt-10 md:w-5/6">
      <h1 class="text-2xl font-semibold md:mb-5 md:text-4xl">
        {{ $innovillage->title }}
      </h1>
      <h5 class="mb-3 text-lg md:text-2xl">
        Innovillage {{ $innovillage->year }}
      </h5>
      {{-- images slide & Our Team --}}
      <div class="md:flex">
        {{-- images slide --}}
        <div class="h-[502px] w-full md:w-[60%]">
          <div class="h-[80%]">
            <img
              id="main-image"
              src=""
              alt="{{ $innovillage->title }}"
              class="h-full w-full bg-gray-300 opacity-0 transition-opacity duration-1000 ease-in-out"
            />
          </div>
          <div
            class="flex h-[20%] gap-1 overflow-y-hidden overflow-x-scroll py-1 scrollbar-none"
          >
            @foreach ($innovillage->photos as $photo)
              <img
                class="thumbnail h-[100%] w-[130px] cursor-pointer bg-gray-300 transition duration-500 hover:scale-110"
                src="{{ $photo->photo_url }}"
                alt="{{ $innovillage->title }}"
              />
            @endforeach
          </div>
        </div>
        {{-- our team || @query LAPTOP --}}
        <div
          class="ms-5 h-[502px] overflow-y-scroll rounded-[30px] p-5 shadow-customBox scrollbar-none max-md:hidden md:w-[40%] border-2 border-[#D9D9D9]"
        >
          <h5 class="mb-2 text-xl font-semibold">Our Team</h5>
          <div class="grid grid-cols-2 justify-center gap-2">
            @foreach ($innovillage->teams as $team)
              <div class="relative min-h-[125px]">
                <!-- Overlay hitam transparan -->
                <div class="absolute inset-0 bg-black opacity-30"></div>
                <img
                  src="{{ asset("storage/" . $team->photo) }}"
                  alt="{{ $team->name }}"
                  class="h-full w-full bg-gray-300"
                />
                <p class="absolute bottom-4 left-2 text-xs text-white">
                  {{ $team->name }}
                </p>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    {{-- Read News --}}
    <div class="my-5 w-11/12 md:w-5/6">
      <h2 class="mb-3 text-xl font-semibold">{{ $innovillage->title }}</h2>
      <p class="text-justify">
        {{ $innovillage->description }}
      </p>
    </div>

    {{-- our team || @query HP --}}
    <div
      class="mx-3 mb-5 rounded-[30px] p-5 shadow-customBox md:hidden md:w-[30%]"
    >
      <h5 class="mb-2 text-xl font-semibold">Our Team</h5>
      <div class="flex flex-wrap justify-center gap-5">
        @foreach ($innovillage->teams as $team)
          <div class="relative h-[125px] w-[150px]">
            <!-- Overlay hitam transparan -->
            <div class="absolute inset-0 bg-black opacity-30"></div>
            <img
              src="{{ asset("storage/" . $team->photo) }}"
              alt="{{ $team->name }}"
              class="h-full w-full bg-gray-300"
            />
            <p class="absolute bottom-4 left-2 text-sm text-white">
              {{ $team->name }}
            </p>
          </div>
        @endforeach
      </div>
    </div>
  </main>
  {{-- footer --}}

  <!-- JavaScript -->
  <script src="{{ asset("assets/js/navbar.js") }}"></script>
  <script src="{{ asset("assets/js/imageSlide.js") }}"></script>
</div>
</x-guest-layout>
