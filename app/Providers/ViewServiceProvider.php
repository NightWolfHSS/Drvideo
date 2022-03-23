<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\View\Composers\ProfileComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
// use App\Models\Footer_itm;
// use App\Models\Slider;

class ViewServiceProvider extends ServiceProvider
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
        
        View::composer(['home.index' ], function($view) {
            $slides = DB::table('sliders')->get();
            // if slides == null
            if ($slides->isEmpty()) {
                $slides = null;
            }
            $footer = DB::table('footer_itms')->get();
            $view->with(
                [
                    'footer' => $footer,
                    'slides' => $slides
                ]
            );
        });
    }
}