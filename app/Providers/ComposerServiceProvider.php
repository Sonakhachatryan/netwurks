<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer([
            'layouts.app',
            'associate.dashboard'
        ], 'App\Http\ViewComposers\AssociateComposer');

        view()->composer([
            'admin.layouts.index'
        ], 'App\Http\ViewComposers\AdminComposer');

        view()->composer([
            'customer.dashboard'
        ], 'App\Http\ViewComposers\CustomerComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
