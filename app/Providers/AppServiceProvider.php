<?php

namespace App\Providers;

use App\Models\TimeLog;
use App\Observers\TimeLogObserver;
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

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        TimeLog::observe(TimeLogObserver::class);
    }
}
