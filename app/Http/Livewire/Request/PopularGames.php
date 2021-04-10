<?php

namespace App\Http\Livewire\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use GuzzleHttp;
use Illuminate\Support\Str;

class PopularGames extends Component
{
    public $popularGames = [];

    public function loadPopularGames()
    {
        $before = Carbon::now()->subMonths(2)->timestamp;
        $after = Carbon::now()->addMonths(2)->timestamp;

        $popularGamesUnformatted = Cache::remember('popular-games', 7, function () use ($before, $after) {
//            sleep(3);
            Http::withHeaders(config('services.igdb.headers'))
                ->withBody("
                fields name, cover.url, total_rating_count, first_release_date, platforms.abbreviation, rating, slug;
                where platforms = (48, 49, 130, 6)
                & ( first_release_date > {$before}
                & first_release_date < {$after};
                sort rating_count desc;
                limit 12;", "text/plain"
                )->post(config('services.igdb.endpoint'))->json();
        });

//        dump($this->formatForView($popularGamesUnformatted));

        $this->popularGames = $this->formatForView($popularGamesUnformatted);
    }

    public function render()
    {
        return view('livewire.request.popular-games');
    }

    private function formatForView($games)
    {
        return collect($games)->map(function ($game) {
            return collect($game)->merge([
                'coverImageUrl' => Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']),
                'rating' => isset($game['rating']) ? round($game['rating']).'%' : null,
                'platforms' => collect($game['platforms'])->pluck('abbreviation')->implode(', '),
            ]);
        })->toArray();
    }

}