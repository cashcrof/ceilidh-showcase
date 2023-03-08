<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="antialiased bg-white">
    <header class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-left">
            <div class="md:flex md:justify-between md:items-left">
                <a href="/" class="text-s font-bold uppercase">Home</a>
                <div class="mt-8 md:mt-0">
                    <a href="/projects" class="ml-3 text-xs font-bold uppercase">Projects</a>
                    <a href="/about" class="ml-3 text-xs font-bold uppercase">About</a>
                </div>
            </div>
            @if (session()->has('success'))
                <div class="md:flex md:justify-center md:items-center">
                    <p class="text-xs font-bold uppercase border border-green-700 rounded px-4 py-2">
                        {{ session()->get('success') }}
                    </p>
                </div>
            @elseif (session()->has('error'))
                <div class="flex justify-center items-center bg-gray-100 w-full py-3">
                    <p
                        class="text-xs color-red-500 font-bold bg-white uppercase border border-red-700 rounded px-4 py-2">
                        {{ session()->get('error') }}
                    </p>
                </div>
            @endif



            <div class="mt-4 md:mt-0">
                @auth
                    <span class="text-xs font-bold uppercase"> {{ auth()->user()->name }} </span>


                    @if (auth()->user()->isAdmin())
                        <a href="/admin" class="ml-4 text-s font-bold uppercase">Admin</a>
                    @endif

                    <a href="/logout" class="ml-3 text-xs font-bold uppercase">Logout</a>
                @else
                    <a href="/login" class="ml-3 text-xs font-bold uppercase">Log In</a>
                    <a href="/register" class="ml-3 text-xs font-bold uppercase">Register</a>
                @endauth
            </div>

        </nav>
    </header>

    {{ $content }}

    <footer class="px-6 py-8">
        <div class="text-center text-xs text-gray-400">&copy; 2021 - {{ date('Y') }}. All rights reserved.</div>

</body>

</html>
