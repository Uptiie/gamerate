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
                        <div class="relative">
                            <input type="text" class="w-64 bg-gray-600 border-gray-600 text-gray-300 text-sm rounded-full px-3 pl-8 py-1 placeholder-gray-400" placeholder="Search for games...">
                            <div class="absolute top-0 flex items-center h-full ml-2">
                                <svg class="ml-2 text-gray-300 fill-current" xmlns="http://www.w3.org/2000/svg" width="12" height="14" viewBox="0 0 941.839 942">
                                    <path id="Icon_awesome-search" data-name="Icon awesome-search" d="M929.03,814.419,745.616,631a44.119,44.119,0,0,0-31.274-12.878H684.355A380.779,380.779,0,0,0,765.3,382.65C765.3,171.273,594.028,0,382.65,0S0,171.273,0,382.65,171.273,765.3,382.65,765.3a380.779,380.779,0,0,0,235.477-80.945v29.987A44.119,44.119,0,0,0,631,745.616L814.419,929.03a43.97,43.97,0,0,0,62.365,0l52.063-52.063a44.359,44.359,0,0,0,.184-62.549ZM382.65,618.127c-130.064,0-235.477-105.229-235.477-235.477,0-130.064,105.229-235.477,235.477-235.477,130.064,0,235.477,105.229,235.477,235.477C618.127,512.714,512.9,618.127,382.65,618.127Z"/>
                                </svg>
                            </div>
                        </div>
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
    </body>
</html>
