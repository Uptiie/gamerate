<?php

namespace App\Http\Livewire\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Livewire\Component;

class MostAnticipated extends Component
{
    public $mostAnticipated = [];

    public function loadMostAnticipated()
    {
        $before = Carbon::now()->subMonths(2)->timestamp;
        $afterFourMonths = Carbon::now()->addMonths(4)->timestamp;

        $this->mostAnticipated = Cache::remember('most-anticipated', 7, function () use ($before, $afterFourMonths) {
            Http::withHeaders(config('services.igdb.headers'))->withBody(
                 "
                fields name, cover.url, rating_count, first_release_date, platforms.abbreviation, rating, slug, summary;
                where platforms = (48, 49, 130, 6)
                & ( first_release_date > {$before}
                & first_release_date < {$afterFourMonths});
                sort rating_count desc;
                limit 4;", "plain/text"
            )->post(config('services.igdb.endpoint'))->json();
        });

    }
    public function render()
    {
        return view('livewire.request.most-anticipated');
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
