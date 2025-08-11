<x-guest-layout>
    @push("styles")
  <link rel="stylesheet" href="{{ asset("assets/css/slide.css") }}" />
@endpush

<div>
    <header>
        @include('public.components.navbar')
  </header>

  <main class="flex flex-col items-center pt-[120px]">
    <div class="relative w-11/12 md:w-5/6">
      <div class="mb-5 flex justify-center">
        <img src="{{ asset('assets/images/activity/kedai.png') }}" alt="Logo Kedai CoE">
        <h1 class="text-3xl font-bold self-center p-2">Kedai CoE</h1>
      </div>
      @foreach ($shops->sortByDesc('created_at') as $shop)
        <div
          wire:key="shop-{{ $shop->id }}"
          class="shop-card mb-5 overflow-hidden rounded-md border-2 border-[#D9D9D9] p-5"
          data-shop-id="{{ $shop->id }}"
        >
          <div class="clearfix">
            <div class="float-left mb-10 mr-5 h-[400px] w-full md:w-[500px]">
              <div class="h-[80%]">
                <!-- Gambar utama dengan data attribute -->
                <img
                  src="{{ $shop->first_photo->photo_url }}"
                  alt="{{ $shop->title }}"
                  class="main-image opacity-1 h-full w-full bg-gray-300 object-cover transition-opacity duration-1000 ease-in-out"
                  data-shop-id="{{ $shop->id }}"
                />
              </div>
              <div
                class="flex h-[20%] gap-1 overflow-y-hidden overflow-x-scroll py-1 scrollbar-none"
              >
                @foreach ($shop->photos as $photo)
                  <img
                    src="{{ $photo->photo_url }}"
                    alt="{{ $shop->title }}"
                    class="thumbnail h-full w-[70px] cursor-pointer bg-gray-300 object-cover transition duration-500 hover:scale-110"
                    data-shop-id="{{ $shop->id }}"
                  />
                @endforeach
              </div>
              <div class="mt-3 flex">
                <div class="flex">
                  <svg
                    class="h-6 w-6 text-gray-800 dark:text-white"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    fill="none"
                    viewBox="0 0 24 24"
                  >
                    <path
                      fill="currentColor"
                      fill-rule="evenodd"
                      d="M3 8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8Zm5-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3H8Zm7.597 2.214a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2h-.01a1 1 0 0 1-1-1ZM12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm-5 3a5 5 0 1 1 10 0 5 5 0 0 1-10 0Z"
                      clip-rule="evenodd"
                    />
                  </svg>
                  <span class="font-semibold">{{ $shop->instagram }}</span>
                </div>
                <div class="ms-4 flex">
                  <svg
                    class="h-6 w-6 text-gray-800 dark:text-white"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      d="M7.978 4a2.553 2.553 0 0 0-1.926.877C4.233 6.7 3.699 8.751 4.153 10.814c.44 1.995 1.778 3.893 3.456 5.572 1.68 1.679 3.577 3.018 5.57 3.459 2.062.456 4.115-.073 5.94-1.885a2.556 2.556 0 0 0 .001-3.861l-1.21-1.21a2.689 2.689 0 0 0-3.802 0l-.617.618a.806.806 0 0 1-1.14 0l-1.854-1.855a.807.807 0 0 1 0-1.14l.618-.62a2.692 2.692 0 0 0 0-3.803l-1.21-1.211A2.555 2.555 0 0 0 7.978 4Z"
                    />
                  </svg>
                  <span class="font-semibold">{{ $shop->whatsapp }}</span>
                </div>
              </div>
            </div>
            <h5 class="text-xl font-semibold">{{ $shop->title }}</h5>
            <p class="text-justify text-lg">{{ $shop->description }}</p>
          </div>
        </div>
      @endforeach
    </div>
    @include('layouts.pagination')
  </main>

  <!-- JavaScript -->
  <script src="{{ asset("assets/js/navbar.js") }}"></script>
  <script src="{{ asset("assets/js/imageSlides.js") }}"></script>
</div>

</x-guest-layout>
