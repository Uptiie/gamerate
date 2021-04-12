<div wire:init="loadPopularGames" class="popular-games text-gray-300 text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 pb-16">
    @forelse($popularGames as $game)
       <x-game-card :game="$game"/>
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

@push('scripts')
    @include('_rating', [
        'event' => 'gameWithRatingAdded'
])
{{--    <script>--}}
{{--        Livewire.on('gameWithRatingAdded', params => {--}}
{{--            console.log('A post was added with the id of: ' + params.slug);--}}
{{--        })--}}
{{--    </script>--}}
@endpush
