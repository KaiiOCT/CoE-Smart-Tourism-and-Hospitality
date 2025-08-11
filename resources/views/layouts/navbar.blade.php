<div>
    <nav class="fixed top-0 z-50 w-full border-b border-gray-200 bg-white">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    @if (! (Request::is("admin") || Request::is("admin/login")))
                    <button
                        data-drawer-target="logo-sidebar"
                        data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar"
                        type="button"
                        class="inline-flex items-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 sm:hidden">
                        <span class="sr-only">Open sidebar</span>
                        <svg
                            class="h-6 w-6"
                            aria-hidden="true"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                clip-rule="evenodd"
                                fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                        </svg>
                    </button>
                    @endif

                    <a href="{{ route('dashboard') }}" class="ms-2 flex md:me-24">
                        <img
                            src="{{ asset("assets/images/logo.png") }}"
                            class="me-3 h-8"
                            alt="FlowBite Logo" />
                        <span
                            class="self-center whitespace-nowrap text-xl font-semibold sm:text-2xl">
                            Admin
                        </span>
                    </a>
                </div>
                @auth
                <form method="POST" action="{{ route('logout') }}" class="flex items-center">
                    @csrf
                    <button type="submit" class="flex cursor-pointer items-center">
                        <div class="ms-3 flex items-center">
                            <div class="flex items-center space-x-2 hover:text-red-700">
                                <img src="{{ asset("assets/icons/logout.png") }}" alt="Logout" />
                                <span class="font-medium text-red-500 hover:text-red-700">Logout</span>
                            </div>
                        </div>
                    </button>
                </form>
                @endauth
            </div>
        </div>
    </nav>
</div>