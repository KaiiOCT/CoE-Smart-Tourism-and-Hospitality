<x-app-layout>
    <div>
        <div class="flex justify-between">
            <div class="">
                <h1 class="text-2xl font-semibold">
                    Managemen Konten Pengabdian Masyarakat
                </h1>
                <p class="text-sm font-medium">Pilih Konten untuk menedit :</p>
            </div>
            <a href="{{ route('admin.activity') }}" class="hidden font-medium md:block">
                <svg class="w-6 h-6 inline" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                    stroke-linecap="round" stroke-linejoin="round">
                    <line x1="20" y1="12" x2="5" y2="12" />
                    <polyline points="10 18 5 12 10 6" />
                </svg>
                Kembali
            </a>
        </div>
        <div class="mt-10 grid grid-cols-6 gap-x-5 gap-y-5 md:grid-cols-12">
            <a href="{{ route('admin.innovilage.index') }}" class="col-span-3 flex flex-col items-center rounded-lg border border-gray-200 bg-white px-3 py-2 shadow lg:py-7">
                <img class="h-36" src="{{ asset('assets/icons/innovillage.png') }}" alt="Innovillage" />
                <h5 class="mb-1 text-center text-xl font-medium">Innovillage</h5>
            </a>
            <a href="{{ route('admin.service.index') }}" class="col-span-3 flex flex-col items-center rounded-lg border border-gray-200 bg-white px-3 py-2 shadow lg:py-7">
                <img class="h-36" src="{{ asset('assets/icons/pm.png') }}" alt="Pengabdian Masyarakat" />
                <h5 class="mb-1 text-center text-xl font-medium">Pengabdian Masyarakat</h5>
            </a>
        </div>
    </div>

</x-app-layout>