<nav id="homeNavbar" class="fixed z-50 w-full border-gray-200 bg-transparent md:px-20 md:text-white">
    <div class="flex flex-wrap items-center justify-between px-5 py-2">
        <a id="colorTxtHP" href="{{ route("home") }}"
            class="flex items-center space-x-3 max-md:text-white rtl:space-x-reverse">
            <img src="{{ asset("assets/images/home/logo.png") }}" class="h-8 md:h-16" alt="Ceo Smart Toursm" />
            <span class="self-center whitespace-nowrap text-xs font-semibold md:text-xl">
                Center of Excellence
                <br />
                Smart Tourism & Hospitality
            </span>
        </a>
        <button id="colorToggleHP" data-collapse-toggle="navbar-dropdown" type="button"
            class="inline-flex h-10 w-10 items-center justify-center rounded-lg p-2 text-sm text-gray-100 focus:outline-none focus:ring-0 max-md:text-white md:hidden"
            aria-controls="navbar-dropdown" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full text-sm md:block md:w-auto" id="navbar-dropdown">
            <ul
                class="mt-4 flex flex-col rounded-lg border border-gray-100 bg-white p-4 font-medium md:mt-0 md:flex-row md:space-x-8 md:border-0 md:bg-transparent md:p-0 rtl:space-x-reverse">
                <li>
                    <a href="{{ route("home") }}"
                        class="block rounded bg-gray-100 px-3 py-2 text-orange1 hover:bg-gray-100 hover:text-orange1 md:bg-transparent md:bg-none md:p-0 hover:md:bg-transparent"
                        aria-current="page">
                        Beranda
                    </a>
                </li>

                <!-- Tentang Kami Dropdown -->
                <li class="relative md:block">
                    <button id="dropdownAboutUsLink" data-dropdown-toggle="aboutUsDropdown"
                        class="flex w-full items-center justify-between rounded px-3 py-2 hover:bg-gray-100 hover:text-orange1 md:w-auto md:border-0 md:p-0 md:hover:bg-transparent">
                        Tentang Kami
                        <svg id="toggledropDownIcon1" class="ms-2.5 h-2.5 w-2.5 transition-transform duration-300"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <!-- Dropdown menu Tentang Kami -->
                    <div id="aboutUsDropdown"
                        class="z-10 hidden w-full divide-y divide-gray-100 rounded-lg border border-gray-300 bg-white px-2 font-medium text-black shadow md:w-auto md:border-0 md:px-0 md:font-normal">
                        <ul class="py-2 text-gray-700" aria-labelledby="dropdownLargeButton">
                            <li>
                                <a href="{{ route("history") }}"
                                    class="block text-nowrap px-4 py-2 text-sm hover:bg-gray-100 hover:text-orange1 hover:md:bg-transparent">
                                    Sejarah CoE STH
                                </a>
                            </li>
                            <li>
                                <a href="{{ route("team") }}"
                                    class="block text-nowrap px-4 py-2 text-sm hover:bg-gray-100 hover:text-orange1 hover:md:bg-transparent">
                                    Anggota Tim
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Aktivitas Dropdown -->
                <li class="relative">
                    <button id="activityDropdownLink" data-dropdown-toggle="activityDropdown"
                        class="flex w-full items-center justify-between rounded px-3 py-2 hover:bg-gray-100 hover:text-orange1 md:w-auto md:border-0 md:p-0 md:hover:bg-transparent">
                        Aktivitas
                        <svg id="toggledropDownIcon2" class="ms-2.5 h-2.5 w-2.5 transition-transform duration-300"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <!-- Dropdown menu Aktivitas -->
                    <div id="activityDropdown"
                        class="z-10 hidden w-full divide-y divide-gray-100 rounded-lg border border-gray-300 bg-white px-2 font-medium text-black shadow md:w-auto md:border-0 md:px-0 md:font-normal">
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownLargeButton">
                            {{-- item berita --}}
                            <li>
                                <a href="{{ route("news") }}"
                                    class="block text-nowrap px-4 py-2 text-sm hover:bg-gray-100 hover:text-orange1 hover:md:bg-transparent">
                                    Berita
                                </a>
                            </li>

                            {{-- item Riset dan Publikasi --}}
                            <li class="group relative" aria-labelledby="dropdownResearchLink">
                                {{-- desktop button --}}
                                <a href="{{ route("research") }}"
                                    class="hidden w-full items-center justify-between text-nowrap rounded px-4 py-2 text-gray-900 hover:bg-gray-100 hover:text-orange1 md:flex md:border-0 md:hover:bg-transparent">
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
                                            <a href="{{ route("innovillage") }}"
                                                class="block px-4 py-2 hover:bg-gray-100 hover:text-orange1">
                                                Innovillage
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route("journal") }}"
                                                class="block px-4 py-2 hover:bg-gray-100 md:hover:text-orange1">
                                                Jurnal Penelitian
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                {{-- mobile button --}}
                                <button id="" data-dropdown-toggle="researchDropdown"
                                    class="flex w-full items-center justify-between text-nowrap rounded px-4 py-2 hover:bg-gray-100 hover:text-orange1 md:hidden md:w-auto md:border-0 md:p-0 md:hover:bg-transparent">
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
                                            <a href="{{ route("innovillage") }}"
                                                class="block px-4 py-2 hover:bg-gray-100 hover:text-orange1">
                                                Innovillage
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route("journal") }}"
                                                class="block px-4 py-2 hover:bg-gray-100 hover:text-orange1">
                                                Jurnal Penelitian
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            {{-- Inovasi --}}
                            <li class="group relative" aria-labelledby="dropdownNavbarLink">
                                {{-- desktop button --}}
                                <a href="{{ route("innovation") }}"
                                    class="hidden w-full items-center justify-between rounded px-4 py-2 text-gray-900 hover:bg-gray-100 md:flex md:border-0 md:hover:bg-transparent md:hover:text-orange1">
                                    Inovasi
                                    <svg class="ms-2.5 h-2.5 w-2.5 transition-transform duration-300 group-hover:-rotate-90"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </a>
                                <!-- Desktop Dropdown menu for Innovillage -->
                                <div id="doubleDropdown1"
                                    class="absolute left-full top-0 z-10 hidden w-auto divide-y divide-gray-100 text-nowrap rounded-lg bg-white shadow group-hover:hidden md:group-hover:block">
                                    <ul class="py-2">
                                        @foreach ($innovations as $innovation)
                                            <li>
                                                <a href="{{ route("innovation.show", ["innovation" => $innovation->id]) }}"
                                                    class="block px-4 py-2 hover:bg-gray-100 md:hover:text-orange1">
                                                    {{ $innovation->title }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                {{-- mobile button --}}
                                <button id="" data-dropdown-toggle="innovationDropdown"
                                    class="flex w-full items-center justify-between text-nowrap rounded px-4 py-2 hover:bg-gray-100 hover:text-orange1 md:hidden md:w-auto md:border-0 md:p-0 md:hover:bg-transparent">
                                    Inovasi
                                    <svg id="" class="ms-2.5 h-2.5 w-2.5 transition-transform duration-300"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button>
                                {{-- mobile dropdown menu for innovation --}}
                                <div id="innovationDropdown"
                                    class="absolute top-0 z-10 hidden w-full divide-y divide-gray-100 text-nowrap rounded-lg border bg-white shadow">
                                    <ul class="p-2 text-gray-700">
                                        @foreach ($innovations as $innovation)
                                            <li>
                                                <a href="{{ route("innovation.show", ["innovation" => $innovation->id]) }}"
                                                    class="block px-4 py-2 hover:bg-gray-100 hover:text-orange1">
                                                    Innovillage
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>

                            {{-- Bisnis --}}
                            <li class="group relative" aria-labelledby="dropdownNavbarLink">
                                {{-- desktop button --}}
                                <a href="{{ route("business") }}"
                                    class="hidden w-full items-center justify-between rounded px-4 py-2 text-gray-900 hover:bg-gray-100 md:flex md:border-0 md:hover:bg-transparent md:hover:text-orange1">
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
                                            <a href="{{ route("business.training") }}"
                                                class="block text-nowrap px-4 py-2 hover:bg-gray-100 md:hover:text-orange1">
                                                Rumah Jurnal
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route("business.shop") }}"
                                                class="block text-nowrap px-4 py-2 hover:bg-gray-100 md:hover:text-orange1">
                                                Kedai CoE
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                {{-- mobile button --}}
                                <button id="" data-dropdown-toggle="businessDropdown"
                                    class="flex w-full items-center justify-between text-nowrap rounded px-4 py-2 hover:bg-gray-100 hover:text-orange1 md:hidden md:w-auto md:border-0 md:p-0 md:hover:bg-transparent">
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
                                            <a href="{{ route("business.training") }}"
                                                class="block px-4 py-2 hover:bg-gray-100 hover:text-orange1">
                                                Rumah Jurnal
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route("business.shop") }}"
                                                class="block px-4 py-2 hover:bg-gray-100 hover:text-orange1">
                                                Kedai CoE
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Program Dropdown -->
                <li class="relative">
                    <button id="dropdownNavbarLink3" data-dropdown-toggle="programDropdown"
                        class="flex w-full items-center justify-between rounded px-3 py-2 hover:bg-gray-100 hover:text-orange1 md:w-auto md:border-0 md:p-0 md:hover:bg-transparent">
                        Program
                        <svg id="toggledropDownIcon3" class="ms-2.5 h-2.5 w-2.5 transition-transform duration-300"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <!-- Dropdown menu Program -->
                    <div id="programDropdown"
                        class="z-10 hidden w-full divide-y divide-gray-100 rounded-lg border border-gray-300 bg-white px-2 font-medium text-black shadow md:w-auto md:border-0 md:px-0 md:font-normal">
                        <ul class="py-2 text-gray-700" aria-labelledby="dropdownLargeButton">
                            <li>
                                <a href="{{ route("intern") }}"
                                    class="block text-nowrap px-4 py-2 text-sm hover:bg-gray-100 hover:text-orange1 hover:md:bg-transparent">
                                    MBKM dan Magang
                                </a>
                            </li>
                            <li>
                                <a href="{{ route("collaboration") }}"
                                    class="block text-nowrap px-4 py-2 text-sm hover:bg-gray-100 hover:text-orange1 hover:md:bg-transparent">
                                    Kerja Sama
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>