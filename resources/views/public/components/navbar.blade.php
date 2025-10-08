@push("styles")
    <style>
        @media (min-width: 1024px) {

            /* Initially hide the dropdown */
            #activityDropdown {
                display: none;
            }

            /* Show the dropdown when the parent <li> is hovered */
            li.relative:hover #activityDropdown {
                display: block;
                left: -50px;
            }
        }
    </style>
@endpush

<nav id="navbar" class="bg-transparent text-white fixed z-50 w-full border-gray-200 md:px-20 transition-colors duration-300 ease-in-out">
    <div class="flex flex-wrap items-center justify-between px-6 py-0">
        <a id="navbarIconText" href="#" class="flex items-center space-x-3">
            <img src="{{ asset('assets/images/sthfinal.png') }}" class="h-8 md:h-16" alt="Ceo Smart Tourism" />

            <span class="self-center text-xs font-semibold md:text-xl leading-tight flex flex-col items-center">
                <h1 class="text-base drop-shadow-md">
                    <span class="tracking-[0.33em]">Center</span>
                    <span class="tracking-[0.26em]">of Excellence</span>
                </h1>
                <h1 class="text-lg drop-shadow-md">Smart Tourism & Hospitality</h1>
            </span>
        </a>

        <button id="menuButton" data-collapse-toggle="mobileMenu" type="button"
            class="inline-flex h-10 w-10 items-center justify-center rounded-lg p-2 text-sm focus:outline-none focus:ring-0 md:hidden"
            aria-controls="mobileMenu" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full text-sm md:block md:w-auto" id="mobileMenu">
            <ul
                class="mt-4 flex flex-col rounded-lg border border-gray-100 bg-white p-4 font-medium md:mt-0 md:flex-row md:space-x-8 md:border-0 md:bg-transparent md:p-0 rtl:space-x-reverse">
                <li>
                    <a href="{{ route("home") }}"
                        class="{{ Request::is("/") ? "text-orange1" : "" }} block rounded px-3 py-2 hover:bg-gray-100 hover:text-orange1 md:bg-transparent md:bg-none md:p-0 hover:md:bg-transparent"
                        aria-current="page">
                        Beranda
                    </a>
                </li>

                <!-- Tentang Kami Dropdown -->
                <li class="group relative pb-2 md:block">
                    <button id="dropdownAboutUsLink"
                        class="{{ Request::is("about-us*") ? "text-orange1" : "" }} flex w-full items-center justify-between rounded px-3 py-2 hover:bg-gray-100 hover:text-orange1 md:w-auto md:border-0 md:p-0 md:hover:bg-transparent">
                        Tentang Kami
                        <svg id="toggledropDownIcon1" class="ms-2.5 h-2.5 w-2.5 transition-transform duration-300"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <!-- Dropdown menu Tentang Kami -->
                    <div id="aboutUsDropdown"
                        class="absolute z-10 mt-2 hidden w-full divide-y divide-gray-100 rounded-lg border border-gray-300 bg-white px-2 font-medium text-black shadow md:w-auto md:border-0 md:px-0 md:font-normal md:group-hover:block">
                        <ul class="py-2 text-gray-700" aria-labelledby="dropdownLargeButton">
                            <li>
                                <a href="{{ route("history.index") }}"
                                    class="{{ Request::is("about-us/history") ? "text-orange1" : "" }} block text-nowrap px-4 py-2 text-sm hover:bg-gray-100 hover:text-orange1 hover:md:bg-transparent">
                                    Sejarah CoE STH
                                </a>
                            </li>
                            <li>
                                <a href="{{ route("team.index") }}"
                                    class="{{ Request::is("about-us/team*") ? "text-orange1" : "" }} block text-nowrap px-4 py-2 text-sm hover:bg-gray-100 hover:text-orange1 hover:md:bg-transparent">
                                    Anggota Tim
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Aktivitas Dropdown -->
                <li class="relative pb-2">
                    <button id="activityDropdownLink"
                        class="{{ Request::is("activity*") ? "text-orange1" : "" }} flex w-full items-center justify-between rounded px-3 py-2 hover:bg-gray-100 hover:text-orange1 md:w-auto md:border-0 md:p-0 md:hover:bg-transparent">
                        Aktivitas
                        <svg id="toggledropDownIcon2" class="ms-2.5 h-2.5 w-2.5 transition-transform duration-300"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <!-- Dropdown menu Aktivitas -->
                    <div id="activityDropdown"
                        class="absolute z-10 mt-2 hidden w-full divide-y divide-gray-100 rounded-lg border border-gray-300 bg-white px-2 font-medium text-black shadow md:w-auto md:border-0 md:px-0 md:font-normal">
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownLargeButton">
                            {{-- item berita --}}
                            <li>
                                <a href="{{ route("news.index") }}"
                                    class="{{ Request::is("activity/news") ? "text-orange1" : "" }} block text-nowrap px-4 py-2 text-sm hover:bg-gray-100 hover:text-orange1 hover:md:bg-transparent">
                                    Berita
                                </a>
                            </li>

                            {{-- item Riset dan Publikasi --}}
                            <li class="group relative" aria-labelledby="dropdownResearchLink">
                                {{-- desktop button --}}
                                <a href="{{ route("research.index") }}"
                                    class="{{ Request::is("activity/research*") ? "text-orange1" : "" }} hidden w-full items-center justify-between text-nowrap rounded px-4 py-2 text-gray-900 hover:bg-gray-100 hover:text-orange1 md:flex md:border-0 md:hover:bg-transparent">
                                    Riset dan Publikasi
                                    <svg class="ms-2.5 h-2.5 w-2.5 transition-transform duration-300 group-hover:-rotate-90"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </a>
                                <!-- Desktop Dropdown menu for Riset dan Publikasi -->
                                <div
                                    class="absolute left-full top-0 z-10 hidden w-auto divide-y divide-gray-100 text-nowrap rounded-lg bg-white shadow group-hover:hidden md:group-hover:block">
                                    <ul class="py-2 text-gray-700">
                                        <li>
                                            <a href="{{ route("journal.index") }}"
                                                class="{{ Request::is("activity/research/journal") ? "text-orange1" : "" }} block px-4 py-2 hover:bg-gray-100 md:hover:text-orange1">
                                                Jurnal Penelitian
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                {{-- mobile button --}}
                                <button id="" data-dropdown-toggle="researchDropdown"
                                    class="{{ Request::is("activity/research*") ? "text-orange1" : "" }} flex w-full items-center justify-between text-nowrap rounded px-4 py-2 hover:bg-gray-100 hover:text-orange1 md:hidden md:w-auto md:border-0 md:p-0 md:hover:bg-transparent">
                                    Riset dan Publikasi
                                    <svg id="" class="ms-2.5 h-2.5 w-2.5 transition-transform duration-300"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button>

                                {{-- mobile dropdown menu for riset dan publikasi --}}
                                <div id="researchDropdown"
                                    class="absolute top-0 z-10 hidden w-full divide-y divide-gray-100 text-nowrap rounded-lg border bg-white shadow">
                                    <ul class="p-2 text-gray-700">
                                        <li>
                                            <a href="{{ route("journal.index") }}"
                                                class="{{ Request::is("activity/research/journal*") ? "text-orange1" : "" }} block px-4 py-2 hover:bg-gray-100 hover:text-orange1">
                                                Jurnal Penelitian
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            {{-- Inovasi --}}
                            <li class="group relative" aria-labelledby="dropdownNavbarLink">
                                {{-- desktop button --}}
                                <a href="{{ route("innovation.index") }}"
                                    class="{{ Request::is("activity/innovation*") ? "text-orange1" : "" }} hidden w-full items-center justify-between rounded px-4 py-2 text-gray-900 hover:bg-gray-100 md:flex md:border-0 md:hover:bg-transparent md:hover:text-orange1">
                                    Inovasi
                                    {{-- <svg
                                        class="ms-2.5 h-2.5 w-2.5 transition-transform duration-300 group-hover:-rotate-90"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg> --}}
                                </a>
                                <!-- Desktop Dropdown menu for Innovillage -->
                                {{-- <div id="doubleDropdown1"
                                    class="absolute left-full top-0 z-10 hidden w-auto divide-y divide-gray-100 text-nowrap rounded-lg bg-white shadow group-hover:hidden md:group-hover:block">
                                    <ul class="py-2">
                                        @foreach ($innovations as $innovation)
                                        <li>
                                            <a href="{{ route(" innovation.show", ["innovation"=> $innovation->id]) }}"
                                                class="{{ Request::is("activity/innovation/" . $innovation->id) ?
                                                "text-orange1" : "" }} block px-4 py-2 hover:bg-gray-100
                                                md:hover:text-orange1"
                                                >
                                                {{ $innovation->title }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div> --}}

                                {{-- mobile button --}}
                                <button id="" data-dropdown-toggle="innovationDropdown"
                                    class="{{ Request::is("activity/innovation*") ? "text-orange1" : "" }} flex w-full items-center justify-between text-nowrap rounded px-4 py-2 hover:bg-gray-100 hover:text-orange1 md:hidden md:w-auto md:border-0 md:p-0 md:hover:bg-transparent">
                                    inovasi
                                </button>
                                {{-- mobile dropdown menu for innovation --}}
                                <div id="innovationDropdown"
                                    class="absolute top-0 z-10 hidden w-full divide-y divide-gray-100 text-nowrap rounded-lg border bg-white shadow">
                                    <ul class="p-2 text-gray-700">
                                        {{-- @foreach ($innovations as $innovation)
                                            <li>
                                                <a href="{{ route("innovation.show", ["innovation" => $innovation->id]) }}"
                                                    class="{{ Request::is("activity/innovation/" . $innovation->id) ? "text-orange1" : "" }} block px-4 py-2 hover:bg-gray-100 hover:text-orange1">
                                                    {{ $innovation->title }}
                                                </a>
                                            </li>
                                        @endforeach --}}
                                    </ul>
                                </div>
                            </li>

                            {{-- Bisnis --}}
                            <li class="group relative" aria-labelledby="dropdownNavbarLink">
                                {{-- desktop button --}}
                                <a href="{{ route("business.index") }}"
                                    class="{{ Request::is("activity/business*") ? "text-orange1" : "" }} hidden w-full items-center justify-between rounded px-4 py-2 text-gray-900 hover:bg-gray-100 md:flex md:border-0 md:hover:bg-transparent md:hover:text-orange1">
                                    Bisnis
                                    <svg class="ms-2.5 h-2.5 w-2.5 transition-transform duration-300 group-hover:-rotate-90"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </a>
                                <!-- Desktop Dropdown menu for Innovillage -->
                                <div id="doubleDropdown1"
                                    class="absolute left-full top-0 z-10 hidden w-auto divide-y divide-gray-100 rounded-lg bg-white shadow group-hover:hidden md:text-nowrap md:group-hover:block">
                                    <ul class="py-2 text-gray-700">
                                        <li>
                                            <a href="{{ route("training.index") }}"
                                                class="{{ Request::is("activity/business/training*") ? "text-orange1" : "" }} block text-nowrap px-4 py-2 hover:bg-gray-100 md:hover:text-orange1">
                                                Arsygo
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route("shop.index") }}"
                                                class="{{ Request::is("activity/business/shop*") ? "text-orange1" : "" }} block text-nowrap px-4 py-2 hover:bg-gray-100 md:hover:text-orange1">
                                                Kedai CoE
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                {{-- mobile button --}}
                                <button id="" data-dropdown-toggle="businessDropdown"
                                    class="{{ Request::is("activity/business*") ? "text-orange1" : "" }} flex w-full items-center justify-between text-nowrap rounded px-4 py-2 hover:bg-gray-100 hover:text-orange1 md:hidden md:w-auto md:border-0 md:p-0 md:hover:bg-transparent">
                                    Bisnis
                                    <svg id="" class="ms-2.5 h-2.5 w-2.5 transition-transform duration-300"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button>
                                {{-- mobile dropdown menu for riset dan publikasi --}}
                                <div id="businessDropdown"
                                    class="absolute top-0 z-10 hidden w-full divide-y divide-gray-100 text-nowrap rounded-lg border bg-white shadow">
                                    <ul class="p-2 text-gray-700">
                                        <li>
                                            <a href="{{ route("journal.index") }}"
                                                class="{{ Request::is("activity/business/training*") ? "text-orange1" : "" }} block px-4 py-2 hover:bg-gray-100 hover:text-orange1">
                                                Arsygo
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="{{ Request::is("activity/business/shop*") ? "text-orange1" : "" }} block px-4 py-2 hover:bg-gray-100 hover:text-orange1">
                                                Kedai CoE
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            {{-- Community Service --}}
                            <li class="group relative" aria-labelledby="dropdownNavbarLink">
                                {{-- desktop button --}}
                                <a href="{{ route("community-service.index") }}"
                                    class="{{ Request::is("activity/community-service*") ? "text-orange1" : "" }} hidden w-full items-center justify-between rounded px-4 py-2 text-gray-900 hover:bg-gray-100 md:flex md:border-0 md:hover:bg-transparent md:hover:text-orange1">
                                    Pengabdian Masyarakat
                                    {{-- <svg
                                        class="ms-2.5 h-2.5 w-2.5 transition-transform duration-300 group-hover:-rotate-90"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg> --}}
                                </a>
                                <!-- Desktop Dropdown menu for community service -->
                                {{-- <div id=""
                                    class="absolute left-full top-0 z-10 hidden w-auto divide-y divide-gray-100 rounded-lg bg-white shadow group-hover:hidden md:text-nowrap md:group-hover:block">
                                    <ul class="py-2 text-gray-700">
                                        <li>
                                            <a href="{{ route(" innovillage") }}" class="{{ Request::is("
                                                activity/community-service/innovillage*") ? "text-orange1" : "" }} block
                                                text-nowrap px-4 py-2 hover:bg-gray-100 md:hover:text-orange1">
                                                Innovillage
                                            </a>
                                        </li>
                                        @foreach ($community_services as $community_service)
                                        <li>
                                            <a href="{{ route(" community-service.show", ["community_service"=>
                                                $community_service->id]) }}"
                                                class="{{ Request::is("activity/community-service/" .
                                                $community_service->id) ? "text-orange1" : "" }} block px-4 py-2
                                                hover:bg-gray-100 md:hover:text-orange1"
                                                >
                                                {{ $community_service->title }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div> --}}

                                {{-- mobile button --}}
                                <button id="" data-dropdown-toggle="communityServiceDropdown"
                                    class="{{ Request::is("activity/community-service*") ? "text-orange1" : "" }} flex w-full items-center justify-between text-nowrap rounded px-4 py-2 hover:bg-gray-100 hover:text-orange1 md:hidden md:w-auto md:border-0 md:p-0 md:hover:bg-transparent">
                                    Pengabdian Masyarakat
                                </button>
                                {{-- mobile dropdown menu for community service --}}
                                <div id="communityServiceDropdown"
                                    class="absolute top-0 z-10 hidden w-full divide-y divide-gray-100 text-nowrap rounded-lg border bg-white shadow">
                                    <ul class="p-2 text-gray-700">
                                        <li>
                                            <a href="{{ route("community-service.index") }}"
                                                class="{{ Request::is("activity/community-service/innovillage*") ? "text-orange1" : "" }} block px-4 py-2 hover:bg-gray-100 hover:text-orange1">
                                                Innovillage
                                            </a>
                                        </li>
                                        {{-- @foreach ($community_services as $community_service)
                                            <li>
                                                <a href="{{ route("community-service.show", ["community_service" => $community_service->id]) }}"
                                                    class="{{ Request::is("activity/community-service/" . $community_service->id) ? "text-orange1" : "" }} block px-4 py-2 hover:bg-gray-100 hover:text-orange1">
                                                    {{ $community_service->title }}
                                                </a>
                                            </li>
                                        @endforeach --}}
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Program Dropdown -->
                <li class="group relative pb-2">
                    <button id="dropdownNavbarLink3"
                        class="{{ Request::is("program*") ? "text-orange1" : "" }} flex w-full items-center justify-between rounded px-3 py-2 hover:bg-gray-100 hover:text-orange1 md:w-auto md:border-0 md:p-0 md:hover:bg-transparent">
                        Program
                        <svg id="toggledropDownIcon3" class="ms-2.5 h-2.5 w-2.5 transition-transform duration-300"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <!-- Dropdown menu Program -->
                    <div id="programDropdown"
                        class="absolute z-10 mt-2 hidden w-full divide-y divide-gray-100 rounded-lg border border-gray-300 bg-white px-2 font-medium text-black shadow md:w-auto md:border-0 md:px-0 md:font-normal md:group-hover:block">
                        <ul class="py-2 text-gray-700" aria-labelledby="dropdownLargeButton">
                            <li>
                                <a href="{{ route("intern.index") }}"
                                    class="{{ Request::is("program/intern*") ? "text-orange1" : "" }} block text-nowrap px-4 py-2 text-sm hover:bg-gray-100 hover:text-orange1 hover:md:bg-transparent">
                                    MBKM dan Magang
                                </a>
                            </li>
                            <li>
                                <a href="{{ route("collaboration.index") }}"
                                    class="{{ Request::is("program/collaboration*") ? "text-orange1" : "" }} block text-nowrap px-4 py-2 text-sm hover:bg-gray-100 hover:text-orange1 hover:md:bg-transparent">
                                    Kerja Sama
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const navbar = document.getElementById("navbar");

        function updateNavbarStyle() {
            if (window.scrollY > 0) {
                navbar.classList.remove("bg-transparent", "text-white");
                navbar.classList.add("bg-white", "text-black", "shadow-md");
            } else {
                navbar.classList.remove("bg-white", "text-black", "shadow-md");
                navbar.classList.add("bg-transparent", "text-white");
            }
        }

        updateNavbarStyle();
        window.addEventListener("scroll", updateNavbarStyle);
    });
    </script>

    <script src="{{ asset("assets/js/dropdownNavbar.js") }}"></script>
    
</nav>
