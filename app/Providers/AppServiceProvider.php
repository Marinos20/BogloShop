<?php

namespace App\Providers;

use App\Models\Category;
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
// Dans AppServiceProvider.php
    public function boot(): void
{
    if (\Schema::hasTable('categories')) {
        $navcategories = Category::all();
        View::share(['navcategories' => $navcategories]);
    }

    // Devise
    $currency = session('currency', 'USD'); // 'USD' par défaut
    View::share('currentCurrency', $currency);

    // Langue
    $locale = session('locale', app()->getLocale());
    app()->setLocale($locale);
    View::share('currentLocale', $locale);
}


}
