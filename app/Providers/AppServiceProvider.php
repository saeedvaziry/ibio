<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Http\Resources\Json\ResourceCollection;
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
        ResourceCollection::withoutWrapping();

        Filament::serving(function () {
            Filament::registerTheme(
                mix('css/admin.css'),
            );
        });
    }
}
