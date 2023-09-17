<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Post;
use App\Models\PageView;
use App\Models\PostView;
use Carbon\Carbon;


class StatsOverview extends BaseWidget
{
    public static function canView(): bool
    {
        return auth()->user()->is_admin;
    }
    protected function getStats(): array
    {
        $data = [
            PageView::where('view_at',  Carbon::now()->subDays(7)->toDateString())
                ->sum('views'),
            PageView::where('view_at',  Carbon::now()->subDays(6)->toDateString())
                ->sum('views'),
            PageView::where('view_at',  Carbon::now()->subDays(5)->toDateString())
                ->sum('views'),
            PageView::where('view_at',  Carbon::now()->subDays(4)->toDateString())
                ->sum('views'),
            PageView::where('view_at',  Carbon::now()->subDays(3)->toDateString())
                ->sum('views'),
            PageView::where('view_at',  Carbon::now()->subDays(2)->toDateString())
                ->sum('views'),
            PageView::where('view_at',  Carbon::now()->subDays()->toDateString())
                ->sum('views'),
            PageView::where('view_at',  Carbon::now()->toDateString())
                ->sum('views'),
        ];
        return [
            //
            Stat::make('Total views', Post::where('published', 1)->sum('view') . ' views')
                ->description('increase ' . PostView::where('view_date', Carbon::now()->toDateString())->sum('views') . ' views')
                // ->description('increase ' . Carbon::yesterday()->toDateString())

                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Total number of posts', Post::where('published', 1)->count())
                ->description('increase ' . Post::where('created_at', '>=', Carbon::now()->toDay())->count() . ' post')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Number of visitors per day', PageView::where('view_at',  Carbon::now()->toDateString())
                ->sum('views'))
                ->description(
                    PageView::where('view_at',  Carbon::now()->toDateString())->sum('views')
                        - PageView::where('view_at',  Carbon::yesterday()->toDateString())->sum('views') > 0 ?
                        'increase ' . PageView::where('view_at',  Carbon::now()->toDateString())->sum('views')
                        - PageView::where('view_at',  Carbon::yesterday()->toDateString())->sum('views') . ' views'
                        :
                        'decade ' .
                        PageView::where('view_at',  Carbon::yesterday()->toDateString())->sum('views')
                        - PageView::where('view_at',  Carbon::now()->toDateString())->sum('views') . ' views'
                )
                ->descriptionIcon(
                    PageView::where('view_at',  Carbon::now()->toDateString())->sum('views')
                        - PageView::where('view_at',  Carbon::yesterday()->toDateString())->sum('views') > 0 ?
                        'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down'
                )
                ->color(
                    PageView::where('view_at',  Carbon::now()->toDateString())->sum('views')
                        - PageView::where('view_at',  Carbon::yesterday()->toDateString())->sum('views') > 0 ?
                        'success' : 'danger'
                )
                ->chart($data)
            // Stat::make('Unique views', '192.1k')
            //     ->description('32k increase')
            //     ->descriptionIcon('heroicon-m-arrow-trending-up')
            //     ->chart([7, 2, 10, 3, 15, 4, 17])
            //     ->color('success'),

            // ...
        ];
    }
}
