<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        View::composer('layouts.*', function ($view) {
            $routeName = optional(request()->route())->getName();
            $menus = config("menu", []);
            $view->with('sideMenus', $menus[$routeName] ?? []);
        });
    }
}
