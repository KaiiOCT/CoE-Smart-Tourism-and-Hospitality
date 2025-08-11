@props([
  "data",
])

<div class="mb-3">
  <div class="flex items-center space-x-2">
    @if ($data->currentPage() != 1)
      <!-- Prev Button -->
      <a
        href="{{ $data->previousPageUrl() }}"
        class="flex h-10 w-10 rotate-180 items-center justify-center rounded-full border border-gray-300 text-gray-500 hover:border-blue-500 hover:text-blue-500"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="2"
          stroke="currentColor"
          class="h-5 w-5"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M9 5l7 7-7 7"
          />
        </svg>
      </a>
    @endif

    @for ($i = 1; $i <= $data->lastPage(); $i++)
      <a
        href="{{ $data->url($i) }}"
        class="{{ $data->currentPage() == $i ? 'border-blue-500 text-blue-500' : 'border-gray-300 text-gray-500 hover:border-blue-500 hover:text-blue-500' }} flex h-10 w-10 items-center justify-center rounded-full border"
      >
        {{ $i }}
      </a>
    @endfor

    @if ($data->currentPage() != $data->lastPage())
      <!-- Next Button -->
      <a
        href="{{ $data->nextPageUrl() }}"
        class="flex h-10 w-10 items-center justify-center rounded-full border border-gray-300 text-gray-500 hover:border-blue-500 hover:text-blue-500"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="2"
          stroke="currentColor"
          class="h-5 w-5"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M9 5l7 7-7 7"
          />
        </svg>
      </a>
    @endif
  </div>
</div>
