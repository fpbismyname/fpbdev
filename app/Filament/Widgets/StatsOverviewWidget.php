<?php

namespace App\Filament\Widgets;

use App\Enums\PostStatus;
use App\Models\Category;
use App\Models\Portfolio;
use App\Models\Post;
use App\Models\Pricing;
use App\Models\Service;
use App\Models\Tag;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Posts', Post::count())
                ->description(Post::where('status', PostStatus::PUBLISHED)->count().' published / '.Post::where('status', PostStatus::DRAFT)->count().' draft')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('primary'),
            Stat::make('Published Posts', Post::where('status', PostStatus::PUBLISHED)->count())
                ->description('Siap tampil di blog')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),
            Stat::make('Services', Service::count())
                ->description('Layanan aktif')
                ->descriptionIcon('heroicon-m-hand-raised')
                ->color('primary'),
            Stat::make('Portfolios', Portfolio::count())
                ->description('Proyek ditampilkan')
                ->descriptionIcon('heroicon-m-bars-3-bottom-left')
                ->color('primary'),
            Stat::make('Pricings', Pricing::count())
                ->description('Paket harga')
                ->descriptionIcon('heroicon-m-currency-dollar')
                ->color('warning'),
            Stat::make('Categories', Category::count())
                ->description(Tag::count().' tags / '.User::count().' users')
                ->descriptionIcon('heroicon-m-square-3-stack-3d')
                ->color('gray'),
        ];
    }
}
