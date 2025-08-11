<x-app-layout>
    <div>
        <div class="flex justify-between">
            <div class="">
                <h1 class="text-2xl font-semibold">Managemen Konten Project Aktivitas</h1>
                <p class="text-sm font-medium">Pilih Konten untuk mengedit :</p>
            </div>
            <a href="{{ route('admin.home') }}" class="hidden font-medium md:block">
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
                <a href="{{ route('admin.news.index') }}" class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                    <img src="{{ asset('assets/icons/news.png') }}" alt="News Icon" class="w-16 h-16 mx-auto mb-4">
                    <h5 class="text-center text-lg font-semibold">Berita</h5>
                </a>
            </div>
            
            <div class="col-span-6 md:col-span-4">
                <a href="{{ route('admin.research') }}" class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                    <img src="{{ asset('assets/icons/research.png') }}" alt="Research Icon" class="w-16 h-16 mx-auto mb-4">
                    <h5 class="text-center text-lg font-semibold">Riset dan Publikasi</h5>
                </a>
            </div>

            <div class="col-span-6 md:col-span-4">
                <a href="{{ route('admin.innovation.index') }}" class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                    <img src="{{ asset('assets/icons/innovation.png') }}" alt="Innovation Icon" class="w-16 h-16 mx-auto mb-4">
                    <h5 class="text-center text-lg font-semibold">Inovasi</h5>
                </a>
            </div>

            <div class="col-span-6 md:col-span-4">
                <a href="{{ route('admin.business') }}" class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                    <img src="{{ asset('assets/icons/business.png') }}" alt="Business Icon" class="w-16 h-16 mx-auto mb-4">
                    <h5 class="text-center text-lg font-semibold">Bisnis</h5>
                </a>
            </div>

            <div class="col-span-6 md:col-span-4">
                <a href="{{ route('admin.community-service.index') }}" class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                    <img src="{{ asset('assets/icons/pm.png') }}" alt="Community Service Icon" class="w-16 h-16 mx-auto mb-4">
                    <h5 class="text-center text-lg font-semibold">Pengabdian Masyarakat</h5>
                </a>
            </div>
        </div>
    </div>

</x-app-layout>