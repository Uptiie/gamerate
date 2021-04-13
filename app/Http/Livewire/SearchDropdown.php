<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SearchDropdown extends Component
{
    public $search = '';
    public $searchResults = [];

    public function render()
    {
        if (count($this->search) >= 2)
        $this->searchResults =
//            sleep(3);
            Http::withHeaders(config('services.igdb.headers'))
                ->withBody(
                "
                search \"{$this->search}\";
                fields name, game.cover.url, game.slug;
                limit 8;
                ",
                "text/plain"
                )->get(config('services.igdb.endpoint'))->json();
        return view('livewire.search-dropdown');
    }
}
