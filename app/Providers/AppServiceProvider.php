<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;


use App\Models\Language;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
  public function boot(): void
{

    View::share(
        'languages',
        Language::where('status','active')
        ->orderBy('sort_order')
        ->get()
    );
       Paginator::useBootstrapFive();

}
}