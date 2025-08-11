<x-app-layout>
    <div>
        <div class="flex justify-between">
            <div class="">
                <h1 class="text-2xl font-semibold">Managemen Konten Bisnis</h1>
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
            <a href="{{ route('admin.training.index') }}" class="col-span-3 flex flex-col items-center rounded-lg border border-gray-200 bg-white px-3 py-2 shadow lg:py-7">
                <img class="h-36" src="{{ asset('assets/images/activity/rumahJurnal.png') }}" alt="Pelatihan" />
                <h5 class="mb-1 text-center text-xl font-medium">Pelatihan</h5>
            </a>
            <a href="{{ route('admin.shop.index') }}" class="col-span-3 flex flex-col items-center rounded-lg border border-gray-200 bg-white px-3 py-2 shadow lg:py-7">
                <img class="h-36" src="{{ asset('assets/icons/kedai.png') }}" alt="Kedai CoE" />
                <h5 class="mb-1 text-center text-xl font-medium">Kedai CoE</h5>
            </a>
        </div>
    </div>
</x-app-layout>
