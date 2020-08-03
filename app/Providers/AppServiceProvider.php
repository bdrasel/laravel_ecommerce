<?php

namespace App\Providers;
use App\Brand;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.website', 'App\Http\View\Composers\SettingComposer');
        View::share('brands', Brand::all());
    }
}
