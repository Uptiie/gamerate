<?php

namespace App\Http\Livewire\Request;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class RecentlyReviewed extends Component
{
    public $recentlyReviewed = [];

    public function loadRecentlyReviewed()
    {
        $before = Carbon::now()->subMonths(2)->timestamp;
        $current = Carbon::now()->timestamp;

        $recentlyReviewedUnformatted = Http::withHeaders(config('services.igdb.headers'))
            ->withBody(
                "fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating, rating_count, summary, slug;
                    where platforms = (48,49,130,6)
                    & (first_release_date >= {$before}
                    & first_release_date < {$current}
                    & rating_count > 5);
                    sort total_rating_count desc;
                    limit 3;
                ", "text/plain"
            )->post(config('services.igdb.endpoint'))
            ->json();

        $this->recentlyReviewed = $this->formatForView($recentlyReviewedUnformatted);

//        collect($this->recentlyReviewed)->filter(function ($game) {
//            return $game['rating'];
//        })->each(function ($game) {
//            $this->emit('reviewGameWithRatingAdded', [
//                'slug' => 'review_'.$game['slug'],
//                'rating' => $game['rating'] / 100
//            ]);
//        });
    }

    public function render()
    {
        return view('livewire.request.recently-reviewed');
    }

    private function formatForView($games)
    {
        return collect($games)->map(function ($game) {
            return collect($game)->merge([
                'name' => isset($game['name']) ?? $game['name'],
                'slug' => isset($game['slug']) ?? $game['slug'],
                'coverImageUrl' => isset($game['cover']) ? Str::replaceFirst('thumb','cover_big', $game['cover']['url']) : 'could not complete',
                'rating' => isset($game['rating']) ? round($game['rating']) : 'Could not complete',
                'platforms' => isset($game['platforms']) ? collect($game['platforms'])->pluck('abbreviation')->implode(', ') : 'could not complete',
                'summary' => isset($game['summary']) ?? $game['summary'],
            ]);
        })->toArray();
    }
}
