<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @hasSection('title')

            <title>@yield('title') - {{ config('app.name') }}</title>
        @else
            <title>{{ config('app.name') }}</title>
        @endif

        <!-- Favicon -->
		<link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ url(mix('css/app.css')) }}">
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ url(mix('js/app.js')) }}" defer></script>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <body class="bg-gray-900">
        <header class=border-gray-800">
            <nav class="container mx-auto flex flex-col lg:flex-row items-center justify-between px-4 py-6">
                <div class="flex flex-col lg:flex-row items-center">
                    <a href="/">
                        <x-logo class="w-40 mb-3 flex-none" />
                    </a>
                    <ul class="flex ml-0 lg:ml-16 space-x-8 text-lg font-medium text-gray-300 mt-6 lg:mt-0 lg:mr-10">
                        <li><a href="#" class="hover:text-gray-500">Games</a></li>
                        <li><a href="#" class="hover:text-gray-500">Reviews</a></li>
                        <li><a href="#" class="hover:text-gray-500">Coming Soon</a></li>
                    </ul>
                    <div class="flex items-center mt-6 lg:mt-0">
                        {{-- search --}}
                        <livewire:search-dropdown/>
                    </div>
                </div>
            </nav>
        </header>

        <main class="py-8">
            @yield('content')
        </main>

        <footer class="bg-gray-900">
            <div class="container mx-auto px-4 py-6 text-gray-300 font-medium">
                Powered By <a href="#" class="underline text-gray-300 hover:text-gray-400">IGDB DATA API</a>
            </div>
        </footer>

        @livewireScripts
        <script src="/js/app.js"></script>
    @stack('scripts')
    </body>
</html>
