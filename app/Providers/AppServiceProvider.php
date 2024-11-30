<?php

namespace App\Providers;

use App\Models\Partner;
use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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


    public function boot()
    {
        Schema::defaultStringLength(191);
        View::composer('*', function ($view) {
            $partners = Partner::where('status', 1)->get();

            $view->with('partners', $partners);
        });


        $setting = Setting::pluck('value', 'key')->toArray();
        View::share('setting', $setting);
    }
}
