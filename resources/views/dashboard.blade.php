<x-app-layout>
    <div class="mx-auto mt-24 flex h-screen max-w-5xl flex-col justify-center px-2 md:mt-0 md:px-0">
        <img src="{{ asset('assets/images/logo.png') }}" alt="" srcset="" class="mx-auto mt-28 md:mt-0" />
        <h1 class="text-center text-4xl font-medium">Managemen Konten</h1>
        <p class="text-center text-lg">Pilih Konten untuk mengedit :</p>
        <div class="mt-10 flex flex-wrap justify-evenly gap-5 md:flex-nowrap md:space-x-6">
            <a href="{{ route('admin.index') }}" class="flex flex-col items-center rounded-lg bg-white p-6 shadow hover:bg-gray-100">
                <img src="{{ asset('assets/icons/project.png') }}" alt="Project Icon" class="mb-3 h-12 w-12">
                <span class="text-center text-lg font-medium">Projek Terkini</span>
            </a>
            <a href="#" class="flex flex-col items-center rounded-lg bg-white p-6 shadow hover:bg-gray-100">
                <img src="{{ asset('assets/icons/activity.png') }}" alt="Activity Icon" class="mb-3 h-12 w-12">
                <span class="text-center text-lg font-medium">Aktivitas</span>
            </a>
            <a href="#" class="flex flex-col items-center rounded-lg bg-white p-6 shadow hover:bg-gray-100">
                <img src="{{ asset('assets/icons/members.png') }}" alt="Members Icon" class="mb-3 h-12 w-12">
                <span class="text-center text-lg font-medium">Anggota</span>
            </a>
            <a href="#" class="flex flex-col items-center rounded-lg bg-white p-6 shadow hover:bg-gray-100">
                <img src="{{ asset('assets/icons/timeline.png') }}" alt="Timeline Icon" class="mb-3 h-12 w-12">
                <span class="text-center text-lg font-medium">Timeline</span>
            </a>
            <a href="#" class="flex flex-col items-center rounded-lg bg-white p-6 shadow hover:bg-gray-100">
                <img src="{{ asset('assets/icons/program.png') }}" alt="Program Icon" class="mb-3 h-12 w-12">
                <span class="text-center text-lg font-medium">Program</span>
            </a>
        </div>
    </div>
</x-app-layout>