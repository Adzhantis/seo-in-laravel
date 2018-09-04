<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {

        View::composer(
            'user_side.front', 'App\Http\ViewComposers\Seo\FrontSeoComposer'
        );

        View::composer(
            'user_side.release', 'App\Http\ViewComposers\Seo\ReleaseSeoComposer'
        );

        View::composer(
            'user_side.pricing', 'App\Http\ViewComposers\Seo\PricingSeoComposer'
        );

        View::composer(
            'user_side.plugin', 'App\Http\ViewComposers\Seo\PluginSeoComposer'
        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register(){}
}