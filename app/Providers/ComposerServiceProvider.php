<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use App\Models\Quarter;
use App\Models\Subject;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
      view()->composer('layouts.partials.sidebar', function($view){
        return $view->with('subjects', Auth::user()->subjects()->get());
      });

      view()->composer('quarters.quarter', function($view){
        return $view->with('quarters', Quarter::with('score.student')->isLive()->latestFirst()->get());
      });
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
