<div class="most-anticipated-container space-y-10 mt-8">
    @forelse($comingSoon as $game)
        <x-game-card-small :game="$game"/>
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
