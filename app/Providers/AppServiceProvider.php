<?php

namespace App\Providers;

use App\Models\Location;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\pagination\paginator;
use Illuminate\Support\Facades\Validator;
use App\Models\Property;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        paginator::useBootstrap();
        View::composer('*', function($view)
        {
            $settig = gs();
            $properties = Property::where('status', 0)->latest()->take(5)->get();
            $locations= Location::all();

            $view->with(['setting' => $settig, 'properties'=>$properties,'locations'=>$locations]);
        });
    }
}
