<?php

namespace App\Providers;

use App\Models\Carousel;
use App\Models\Option;
use App\Models\Social;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        if (Schema::hasTable('carousels')) {
            $logo_url = Carousel::first()->logo_url ?? 'default-logo.png';
        } else {
            $logo_url = 'default-logo.png';
        }

        $options = Schema::hasTable('options') ? Option::first() : null;
        $socials = Schema::hasTable('socials') ? Social::all() : collect();

        View::share('logo', $logo_url);
        View::share('options', $options);
        View::share('socials', $socials);

        Schema::defaultStringLength(191);
    }
}
