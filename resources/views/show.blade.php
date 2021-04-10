@extends('layouts.base')

@section('content')
    <div class="container mx-auto px-4">
{{--        game details --}}
        <div class="game-details border-b border-gray-800 pb-12 flex flex-col lg:flex-row">
            <div class="flex-none">
                <img src="{{ $game['coverImageUrl'] }}" alt="cover" width="400"/>
            </div>
            <div class="lg:ml-12 xl:mr-64 xl:mt-0 lg:mt-0 md:mt-8 mt-8">
                <h2 class="font-semibold text-4xl text-white">{{ $game['name'] }}</h2>
                <div class="text-gray-400 xl:mt-0 lg:mt-0 md:mt-0 mt-4">
                    <span>
                        {{ $game['genres'] }}
                    </span>
                    &middot;
                    <span>
                        {{ $game['involvedCompanies'] }}
                    </span>
                    &middot;
                    <span>
                        {{ $game['platforms'] }}
                    </span>
                </div>

                <div class="flex flex-wrap items-center mt-8">
                    <div class="flex items-center mr-8 xl:mt-0 lg:mt-0 md:mt-0 mt-4">
                        <div class="w-16 h-16 bg-gray-800 rounded-full">
                            <div class="font-semibold text-white text-xs flex justify-center items-center h-full">
                                {{ $game['memberRating'] }}
                            </div>
                        </div>
                        <div class="text-gray-400 ml-4 text-xs">Member <br/> Score</div>
                    </div>
                    <div class="flex items-center xl:mt-0 lg:mt-0 md:mt-0 mt-4">
                        <div class="w-16 h-16 bg-gray-800 rounded-full">
                            <div class="font-semibold text-white text-xs flex justify-center items-center h-full">
                                {{ $game['criticRating'] }}
                            </div>
                        </div>
                        <div class="text-gray-400 ml-4 text-xs">Critic <br/> Score</div>
                    </div>

                    <div class="flex items-center space-x-4 ml-6 md:ml-12 lg:ml-12 xl:ml-12 xl:mt-0 lg:mt-0 md:mt-0 mt-4">
                        <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                            <a href="#" class="text-white hover:text-gray-400">
                                T
                            </a>
                        </div>
                        <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                            <a href="#" class="text-white hover:text-gray-400">
                                T
                            </a>
                        </div>
                        <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                            <a href="#" class="text-white hover:text-gray-400">
                                T
                            </a>
                        </div>
                    </div>
                </div>
                <p class="mt-12 text-gray-400">
                    {{ $game['summary'] }}
                </p>
                <div class="mt-12">
                    <a href="https://youtube.com/watch/{{ $game['videos'][0] }}" class="flex bg-blue-500 text-white font-semibold px-4 py-4 hover:bg-blue-600 rounded transition ease-in-out duration-150">
                        <svg class="w-6 text-white fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 45 45">
                            <path d="M22.5 0C10.08 0 0 10.08 0 22.5S10.08 45 22.5 45 45 34.92 45 22.5 34.92 0 22.5 0zm0 40.5c-9.9225 0-18-8.0775-18-18s8.0775-18 18-18 18 8.0775 18 18-8.0775 18-18 18zm-5.625-7.875L32.625 22.5l-15.75-10.125v20.25z" fill="#000"/>
                        </svg>
                        <span class="ml-2">Play Trailer</span>
                    </a>
                </div>
            </div>
        </div>
{{--        end game details--}}
{{--        images container--}}
        <div class="images-container border-b border-gray-800 pb-12 mt-8">
            <h2 class="text-white uppercase tracking-wide font-semibold">Images</h2>
            <div class="grid gird-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-8">
                @foreach($game['screenshots'] as $screenshot)
                <div>
                    <a href="{{ Str::replaceFirst('thumb', 'screenshot_huge', $screenshot['url']) }}">
                        <img src="{{ Str::replaceFirst('thumb', 'screenshot_big', $screenshot['url']) }}" alt="screenshot" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                </div>
                @endforeach
            </div>
        </div>
{{--        end images container--}}
{{--        similar games--}}
        <div class="similar-games-container mt-8">
            <h2 class="text-white uppercase tracking-wide font-semibold">Similar Games</h2>
            <div class="similar-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12">
                @foreach($game['similar_games'] as $game)
                <div class="game mt-8">
                    <div class="relative inline-block">
                        @if(array_key_exists('cover', $game))
                        <a href="#">
                            <img src="{{ Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']) }}" alt="game cover" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        @endif
                        @if(isset($game['rating']))
                        <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full" style="right: -20px; bottom: -20px">
                            <div class="text-white font-semibold text-xs flex justify-center items-center h-full">
                                {{ round($game['rating']).'%' }}
                            </div>
                        </div>
                        @endif
                    </div>
                    <a href="#" class="text-white block text-base font-semibold leading-tight hover:text-gray-400 mt-8">{{$game['name']}}</a>
                    <div class="text-gray-400 mt-1">
                        @if(array_key_exists('abbreviation', $platform))
                            @foreach($game['platforms'] as $platform)
                                @if (array_key_exists('abbreviation', $platform))
                                    {{ $platform['abbreviation'] }}
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
                @endforeach
            </div> <!-- end similar-games -->
        </div> <!-- end similar-games-container -->
    </div>
@endsection
