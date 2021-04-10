<?php

namespace App\Http\Livewire\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Livewire\Component;

class ComingSoon extends Component
{
    public $comingSoon = [];

    public function loadComingSoon()
    {
        $current = Carbon::now()->timestamp;

        $this->comingSoon = Cache::remember('coming-soon', 7, function () use ($current){
            Http::withHeaders(config('services.igdb.headers'))
                ->withBody("
                fields name, cover.url, rating_count, first_release_date, game_engines.name, platforms.abbreviation, rating, slug, summary;
                where platforms = (48, 49, 130, 6)
                & ( first_release_date > {$current}
                & rating_count > 5);
                sort rating_count asc;
                limit 4;", "text/plain"
            )->post(config('services.igdb.endpoint'))->json();
        });
    }

    public function render()
    {
        return view('livewire.request.coming-soon');
    }

    private function formatForView($games)
    {
        return collect($games)->map(function ($game) {
            return collect($game)->merge([
                'coverImageUrl' => Str::replaceFirst('thumb', 'cover_small', $game['cover']['url']),
                'releaseDate' => Carbon::parse($game['first_release_date'])->format('M d, Y'),
            ]);
        })->toArray();
    }
}
