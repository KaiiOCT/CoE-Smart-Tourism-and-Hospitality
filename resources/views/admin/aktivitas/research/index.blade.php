<x-app-layout>
    <div>
        <div class="flex justify-between">
            <div class="">
                <h1 class="text-2xl font-semibold">
                    Managemen Konten Riset dan Publikasi
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
            <div class="col-span-6 md:col-span-4">
                <a href="{{ route('admin.journal.index') }}" class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                    <img src="{{ asset('assets/icons/journal.png') }}" alt="Journal Icon" class="w-16 h-16 mx-auto mb-4">
                    <h5 class="text-center text-lg font-semibold">Penelitian Jurnal</h5>
                </a>
            </div>
        </div>
    </div>

</x-app-layout>