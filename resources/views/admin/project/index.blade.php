<x-app-layout>
    <div>
        <div class="flex justify-between">
            <div class="">
                <h1 class="text-2xl font-semibold">Managemen Konten Project Terkini</h1>
                <p class="text-sm font-medium">Pilih Konten untuk mengedit :</p>
            </div>
            <button class="rounded-xl bg-gray-200 px-5 py-1.5 text-base font-medium hover:bg-gray-300 transition duration-150 ease-in-out hidden md:inline-flex items-center" onclick="window.location.href='{{ route('dashboard') }}'">
                <svg class="h-6 w-6 mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="20" y1="12" x2="5" y2="12" />
                    <polyline points="10 18 5 12 10 6" />
                </svg>
                Kembali
            </button>
        </div>
        <div class="mt-3 flex justify-between">
            <a
                href="{{ route("admin.project.create") }}"
                class="{{ count($projects) > 0 ? "hidden" : "" }} rounded-xl bg-yellow1 px-5 py-1.5 text-base font-medium hover:bg-yellow-400 focus:outline-none focus:ring-4 focus:ring-yellow-300">
                Tambah Project
            </a>
            <a
                href="{{ route("admin.home") }}"
                class="rounded-xl bg-gray-200 px-5 py-1.5 text-base font-medium md:hidden">
                <svg
                    class="inline h-6 w-6"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="3"
                    stroke-linecap="round"
                    stroke-linejoin="round">
                    <line x1="20" y1="12" x2="5" y2="12" />
                    <polyline points="10 18 5 12 10 6" />
                </svg>
                Kembali
            </a>
        </div>
        @if (count($projects) > 0)
        <div class="mt-5">
            @foreach ($projects as $project)
            <div
                class="flex flex-col rounded-lg border-2 border-gray-200 p-5 md:flex-row md:space-x-16 md:p-12">
                <iframe
                    height="200"
                    {{-- src="https://www.youtube.com/embed/1p8TLgc68O8?si=aeiqI-ORslvfcRWR" --}}
                    src="{{ $project->yt_link }}"
                    title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin"
                    allowfullscreen
                    class="basis-full rounded-3xl md:basis-1/2"></iframe>
                <div
                    class="mt-3 flex basis-full flex-col justify-between md:mt-0 md:basis-1/2">
                    <h5
                        class="mb-2 text-justify text-2xl font-bold tracking-tight text-gray-900">
                        {{ $project->name }}
                    </h5>
                    <p class="mb-3 font-normal text-gray-700">
                        {{ $project->description }}
                    </p>
                    <div class="flex justify-end">
                        <a
                            href="{{ route("admin.project.edit", ["project" => $project->id]) }}"
                            class="rounded-full border border-green-500 px-10 py-1.5 text-center text-sm font-medium text-green-500 hover:bg-green-500 hover:text-white focus:outline-none focus:ring-4 focus:ring-green-300">
                            Edit
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="my-6 text-center">
            <img
                src="{{ asset("assets/icons/empty-date.webp") }}"
                alt=""
                srcset=""
                class="mx-auto h-32" />
            <p class="mt-2 text-base font-medium">Data tidak ditemukan</p>
        </div>
        @endif
    </div>

</x-app-layout>