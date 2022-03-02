<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
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
        //Alpha-space-hyphens custom validator rule.
        Validator::extend('alpha_spaces_hyphens', function ($attribute, $value) {
            return preg_match('/^[\pL\s-]+$/u', $value);
        });
    }
}
