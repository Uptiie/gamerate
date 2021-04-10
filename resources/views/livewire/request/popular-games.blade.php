<div wire:init="loadPopularGames" class="popular-games text-gray-300 text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 pb-16">
    @forelse($popularGames as $game)
        <div class="game mt-8">
            <div class="relative inline-block">
                <a href="{{ route('games.show', $game['slug']) }}">
                    <img src="{{ $game['coverImageUrl'] }}" alt="game cover" class="hover:opacity-75 transition ease-in-out duration-150 rounded-md"/>
                </a>
                @if($game['rating'])
                <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full" style=" right: -20px; bottom: -20px;">
                    <div class="font-semibold text-xs flex justify-center items-center h-full">
                        {{ $game['rating'] }}
                    </div>
                </div>
                @endif
            </div>
            <a href="{{ route('games.show', $game['slug']) }}" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">{{ $game['name'] }}</a>
            <p class="text-gray-400 mt-1">
                {{ $game['platforms'] }}
            </p>
        </div>
        @empty
        @foreach(range(1,12) as $game)
            <div class="game mt-8">
                <div class="relative inline-block">
                    <div class="bg-gray-800 w-44 h-56 rounded-md"></div>
                    <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full" style=" right: -20px; bottom: -20px;">
                    </div>
                </div>
                <div class="block text-transparent bg-gray-700 rounded-md leading-tight mt-3">Title goos here </div>
                <div class="text-transparent bg-gray-700 rounded-md mt-3 inline-block">Switch, xbox, ps4 </div>
            </div>
        @endforeach
    @endforelse
</div>
