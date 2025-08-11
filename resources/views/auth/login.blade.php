<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? "Login - Admin" }}</title>
    @vite(["resources/css/app.css", "resources/js/app.js"])
</head>

<body>
    @include('layouts.navbar')
    
    <main>
        @yield('content')
    </main>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
</body>

</html>
