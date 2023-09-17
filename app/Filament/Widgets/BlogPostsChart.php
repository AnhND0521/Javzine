<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use App\Models\Post;
class BlogPostsChart extends ChartWidget
{
    protected static ?string $heading = 'Number of posts during the year';
    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 'full';
    protected static ?string $maxHeight = '300px';
    
    protected function getData(): array
    {
        $data = Trend::model(Post::class)
        ->between(
            start: now()->startOfYear(),
            end: now()->endOfYear(),
        )
        ->perMonth()
        ->count();
        return [
            'datasets' => [
                [
                    'label' => 'Posts',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }
    public static function canView(): bool
    {
        return auth()->user()->is_admin;
    }
    protected function getType(): string
    {
        return 'line';
    }
}
