<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Flowbite -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navbar')

            @if (Request::is('admin*') && !Request::is('admin/login'))
                @include('layouts.sidebar')
                <!-- Page Content with Sidebar -->
                <div class="p-4 sm:ml-64">
                    <div class="mt-14">
                        {{ $slot }}
                    </div>
                </div>
            @else
                <!-- Page Content without Sidebar -->
                <main>
                    {{ $slot }}
                </main>
            @endif
        </div>

        <!-- Mobile Menu Toggle Script -->
        <script>
            // Toggle mobile menu
            const menuButton = document.querySelector('[data-drawer-target="logo-sidebar"]');
            const sidebar = document.getElementById('logo-sidebar');
            
            if (menuButton && sidebar) {
                menuButton.addEventListener('click', () => {
                    sidebar.classList.toggle('-translate-x-full');
                });
            }
        </script>
         @stack('scripts')
    </body>
</html>
