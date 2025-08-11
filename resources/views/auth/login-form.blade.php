@extends('auth.login')

@section('content')
<div class="mx-auto flex h-screen max-w-xl flex-col justify-center px-2 md:px-0">
    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="mx-auto" />
    <h1 class="text-center text-4xl font-medium">Login</h1>
    
    <form method="POST" action="{{ route('login') }}" class="text-center">
        @csrf
        <div class="mb-6 text-start">
            <label for="username" class="mb-2 block text-base font-medium text-gray-900">
                Username
            </label>
            <input type="text" 
                   id="username" 
                   name="username"
                   class="block w-full rounded-lg border border-gray-300 bg-[#0095DC78] p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" 
                   required 
                   autofocus />
            @error('username')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6 text-start">
            <label for="password" class="mb-2 block text-base font-medium text-gray-900">
                Password
            </label>
            <input type="password" 
                   id="password" 
                   name="password"
                   class="block w-full rounded-lg border border-gray-300 bg-[#0095DC78] p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" 
                   required />
            @error('password')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" 
                class="rounded-lg bg-yellow1 px-5 py-1.5 text-lg font-medium hover:bg-yellow-400 focus:outline-none focus:ring-4 focus:ring-yellow-300">
            Login
        </button>
    </form>
</div>
@endsection 