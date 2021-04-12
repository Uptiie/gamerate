<div class="relative">
    <input
        wire:model.debounce.200ms="search"
        type="text"
        class="w-64 bg-gray-600 border-gray-600 text-gray-300 text-sm rounded-full px-3 pl-8 py-1 placeholder-gray-400"
        placeholder="Search for games...">
    <div class="absolute top-0 flex items-center h-full ml-2">
        <svg class="ml-2 text-gray-300 fill-current" xmlns="http://www.w3.org/2000/svg" width="12" height="14" viewBox="0 0 941.839 942">
            <path id="Icon_awesome-search" data-name="Icon awesome-search" d="M929.03,814.419,745.616,631a44.119,44.119,0,0,0-31.274-12.878H684.355A380.779,380.779,0,0,0,765.3,382.65C765.3,171.273,594.028,0,382.65,0S0,171.273,0,382.65,171.273,765.3,382.65,765.3a380.779,380.779,0,0,0,235.477-80.945v29.987A44.119,44.119,0,0,0,631,745.616L814.419,929.03a43.97,43.97,0,0,0,62.365,0l52.063-52.063a44.359,44.359,0,0,0,.184-62.549ZM382.65,618.127c-130.064,0-235.477-105.229-235.477-235.477,0-130.064,105.229-235.477,235.477-235.477,130.064,0,235.477,105.229,235.477,235.477C618.127,512.714,512.9,618.127,382.65,618.127Z"/>
        </svg>
    </div>

    <div class="absolute z-50 bg-gray-800 text-sm rounded w-64 mt-2">
        <ul>
            <li class="border-b border-700">
                <a href="#" class="block hover:bg-gray-700 px-3 py-3">
                    <img src="#" alt="cover" class="w-10">
                    <span class="ml-4">elda</span>
                </a>
            </li>
        </ul>
    </div>
</div>
