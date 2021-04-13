<div class="relative" x-data="{ isVisible: true }" @click.away="isVisible = false">
    <input
        wire:model.debounce.200ms="search"
        type="text"
        class="w-64 bg-gray-600 border-gray-600 text-gray-300 text-sm rounded-full px-3 pl-8 py-1 placeholder-gray-400"
        placeholder="Search for games (Press '/' to focus)"
        x-ref="search"
        @keydown.window="
            if(event.keyCode === 191) {
                event.preventDefault();
                $refs.search.focus();
            }
        "
        @focus="isVisible = true"
        @keydown.escape.window = "isVisible = false"
        @keydown="isVisible = true"
        @keydown.shift.tab="isVisible = false"
    >
    <div class="absolute top-0 flex items-center h-full ml-2">
        <svg class="ml-2 text-gray-300 fill-current" xmlns="http://www.w3.org/2000/svg" width="12" height="14" viewBox="0 0 941.839 942">
            <path id="Icon_awesome-search" data-name="Icon awesome-search" d="M929.03,814.419,745.616,631a44.119,44.119,0,0,0-31.274-12.878H684.355A380.779,380.779,0,0,0,765.3,382.65C765.3,171.273,594.028,0,382.65,0S0,171.273,0,382.65,171.273,765.3,382.65,765.3a380.779,380.779,0,0,0,235.477-80.945v29.987A44.119,44.119,0,0,0,631,745.616L814.419,929.03a43.97,43.97,0,0,0,62.365,0l52.063-52.063a44.359,44.359,0,0,0,.184-62.549ZM382.65,618.127c-130.064,0-235.477-105.229-235.477-235.477,0-130.064,105.229-235.477,235.477-235.477,130.064,0,235.477,105.229,235.477,235.477C618.127,512.714,512.9,618.127,382.65,618.127Z"/>
        </svg>
    </div>

    <div wire:loading class="spinner top-0 right-0 mr-4 mt-2" style="position: absolute"></div>

    @if (strlen($search) >= 2 )
    <div class="absolute z-50 bg-gray-800 text-sm rounded w-64 mt-2" x-show.transition.opacity.duration.200="isVisible">
        @if (count($searchResults) > 0)
        <ul>
            @foreach($searchResults as $game)
            <li class="border-b border-700">
                <a href="{{ route('games.show', $game['slug']) }}" class="block hover:bg-gray-700 px-3 py-3" @if($loop->last) @keydown.tab="isVisible=false" @endif>
                    @if(isset($game['cover']))
                        <img src="{{ Str::replaceFirst('thumb', 'cover_small', $game['cover']['url']) }}" alt="cover" class="w-10">
                    @else
                        <img src="https://via.placeholder.com/264x352" alt="game cover" class="w-10">
                    @endif
                    <span class="ml-4">{{ $game['name'] }}</span>
                </a>
            </li>
            @endforeach
        </ul>
        @else
            <ul>
                <li>
                    <span>No results found for "{{ $search }}" </span>
                </li>
            </ul>
        @endif
    </div>
    @endif
</div>
