<x-app-layout>
    <div
        class="col-span-3 flex flex-col justify-between overflow-hidden rounded-3xl border-2 p-4">
        <div
            class="relative mb-2 min-h-32 w-full overflow-hidden rounded-lg lg:min-h-20 lg:basis-5/12">
            <img
                class="mx-auto h-full w-full rounded-lg bg-gray-300 object-cover md:w-2/4"
                src="{{ $training->photo_url }}"
                alt="Training Image" />
        </div>
        <div class="text-base">
            <p class="line-clamp-2 font-bold text-gray-900">{{ $training->title }}</p>
            <p class="text-gray-500">{{ $training->type }}</p>
        </div>
        <div class="mt-2 flex justify-evenly space-x-4">
            <button
                data-modal-target="delete-modal-{{ $training->id }}"
                data-modal-toggle="delete-modal-{{ $training->id }}"
                class="w-full rounded-full border border-red-500 px-5 py-1.5 text-center text-sm font-medium text-red-500 hover:bg-red-500 hover:text-white focus:outline-none focus:ring-4 focus:ring-red-300">
                Hapus
            </button>
            <a
                href="{{ route("admin.training.edit", ["training" => $training->id]) }}"
                class="w-full rounded-full border border-green-500 px-5 py-1.5 text-center text-sm font-medium text-green-500 hover:bg-green-500 hover:text-white focus:outline-none focus:ring-4 focus:ring-green-300">
                Edit
            </a>
        </div>

        <div
            id="delete-modal-{{ $training->id }}"
            tabindex="-1"
            class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
            <div class="relative max-h-full w-full max-w-md p-4">
                <div class="relative rounded-lg bg-white shadow">
                    <button
                        type="button"
                        class="absolute end-2.5 top-3 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900"
                        data-modal-hide="delete-modal-{{ $training->id }}">
                        <svg
                            class="h-3 w-3"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 14 14">
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 text-center md:p-5">
                        <svg
                            class="mx-auto mb-4 h-12 w-12 text-gray-400"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 20 20">
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500">
                            Yakin ingin menghapus?
                        </h3>
                        <button
                            wire:click="delete"
                            data-modal-hide="delete-modal-{{ $training->id }}"
                            type="button"
                            class="inline-flex items-center rounded-lg bg-red-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300">
                            Ya, hapus
                        </button>
                        <button
                            data-modal-hide="delete-modal-{{ $training->id }}"
                            type="button"
                            class="ms-3 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100">
                            Tidak
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>