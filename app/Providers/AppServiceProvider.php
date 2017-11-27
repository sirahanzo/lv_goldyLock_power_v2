<?php

namespace App\Providers;

use App\Http\Models\LogAlarm;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('layouts.gp', function ($view) {
            $view
                ->with('happening_alarm', LogAlarm::latest('updated_at')->happening()->get())
                ->with('today', getdate());
        });
    }


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
