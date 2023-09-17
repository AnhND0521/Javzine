<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\PageView;
use App\Models\PostView;
use Carbon\Carbon;

class UserOverview extends BaseWidget
{
    protected static ?int $sort = 1;
    protected function getStats(): array
    {
        $count = 0;
        foreach (Post::where('published', 1)->where('user_id', Auth::user()->id)->get() as $post) {
            $count += $post->users->count(); 
        }
        return [
            //
            Stat::make('Your total views',  Post::where('published', 1)->where('user_id', Auth::user()->id)->sum('view') . ' views'),
            Stat::make('Your total number of posts',  Post::where('published', 1)->where('user_id', Auth::user()->id)->count()),
            Stat::make('Number of your favorites', $count)
        ];
    }
}
