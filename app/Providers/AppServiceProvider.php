<?php

namespace App\Providers;

use App\Livewire\Attributes\Description;
use Illuminate\Support\ServiceProvider;
use Livewire\Features\SupportPageComponents\BaseTitle;

use function Livewire\on;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        on('render', function ($target, $view): void {
            $descriptionAttribute = $target->getAttributes()->whereInstanceOf(Description::class)->first();

            if ($descriptionAttribute) {
                $content = $descriptionAttribute->content;

                // Allow config key string like 'site_content.pages.index.hero.subheadline'
                if (is_string($content) && config($content) !== null) {
                    $resolved = config($content);
                    if (is_string($resolved)) {
                        $content = $resolved;
                    }
                }

                $view->layoutData(['description' => $content]);
            }

            // Support config key for Title too: #[Title('site_content.pages.index.hero.headline')]
            $titleAttribute = $target->getAttributes()->whereInstanceOf(BaseTitle::class)->first();

            if ($titleAttribute && is_string($titleAttribute->content) && config($titleAttribute->content) !== null) {
                $resolved = config($titleAttribute->content);
                if (is_string($resolved)) {
                    $view->layoutData(['title' => $resolved]);
                }
            }
        });
    }
}
