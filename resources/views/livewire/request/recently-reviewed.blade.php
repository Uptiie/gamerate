<div wire:init="loadRecentlyReviewed" class="recently-reviewed-container space-y-12 mt-8">
    @forelse($recentlyReviewed as $game)
        <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
            <div class="relative inline-block">
                <a href="{{ route('games.show', $game['slug']) }}">
                    <img src="{{ $game['coverImageUrl'] }}" alt="game cover" class="w-48 hover:opacity-75 transition ease-in-out duration-150 rounded-md"/>
                </a>
                @if($game['rating'])
                    <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full" style=" right: -20px; bottom: -20px;">
                        <div class="font-semibold text-white text-xs flex justify-center items-center h-full">
                            {{ $game['rating'] }}
                        </div>
                    </div>
                @endif
            </div>
            <div class="ml-12">
                <a href="{{ route('games.show', $game['slug']) }}" class="block text-white text-lg font-semibold leading-tight hover:text-gray-400 mt-4">{{ $game['name'] }}</a>
                <div class="text-gray-400 mt-1">
                    {{ $game['platforms'] }}
                </div>
                <div class="mt-6 text-gray-400 hidden lg:block">
                    {{ $game['summary'] }}
                </div>
            </div>
        </div>
    @empty
    @foreach(range(1,3) as $game)
    <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
        <div class="relative inline-block">
            <div class="w-48 h-56 rounded-md bg-gray-700"></div>
            <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-700 rounded-full" style=" right: -20px; bottom: -20px;"></div>
        </div>
        <div class="ml-12">
            <div class="block text-transparent bg-gray-700 rounded-md leading-tight mt-4">Name goes here</div>
            <div class="text-transparent bg-gray-700 rounded-md mt-3 inline-block">
                Platforms go here
            </div>
            <div class="mt-6 text-transparent bg-gray-700 rounded-md hidden lg:block">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
        </div>
    </div>
    @endforeach
    @endforelse
</div>
