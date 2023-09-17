<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Support\Facades\Auth;
class UserPostsChart extends ChartWidget
{
    protected static ?string $heading = 'Number of your posts per month';
    protected static ?int $sort = 3;
    protected int | string | array $columnSpan = 'full';
    protected static ?string $maxHeight = '300px';
    protected function getData(): array
    {
        $data = Trend::query(Post::where('user_id',Auth::user()->id))
        ->between(
            start: now()->startOfYear(),
            end: now()->endOfYear(),
        )
        ->perMonth()
        ->count();
        return [
            'datasets' => [
                [
                    'label' => 'Blog posts',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
