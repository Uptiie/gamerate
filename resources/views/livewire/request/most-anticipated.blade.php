<div class="most-anticipated-container space-y-10 mt-8">
    @forelse($mostAnticipated as $game)
        <div class="game flex">
            <a href="{{ route('games.show', $game['slug']) }}">
                <img src="{{ $game['coverImageUrl'] }}" alt="game cover" class="w-16 hover:opacity-75 transition ease-in-out duration-150 rounded-sm"/>
            </a>
            <div class="ml-4">
                <a href="{{ route('games.show', $game['slug']) }}" class="hover:text-gray-300 text-white">{{ $game['name'] }}</a>
                <div class="text-gray-400 text-sm mt-1">{{ $game['releaseDate'] }}</div>
            </div>
        </div>
        @empty
    @foreach(range(1,3) as $game)
        <div class="game flex">
            <div class="bg-gray-800 w-24 h-32 rounded-md"></div>
            <div class="ml-4">
                <div class="text-transparent bg-gray-700 rounded-md leading-tight mt-3">Name goes here</div>
                <div class="text-transparent bg-gray-700 rounded-md mt-3 text-sm">Game release date</div>
            </div>
        </div>
    @endforeach
    @endforelse

</div>
