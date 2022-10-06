<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Role;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    //     Role::where('name','SuperAdmin')->first()->getPermissionNames();
    //     if (request()->is('admin/*')) {
    //         if(Auth::guard()->check() && auth()->user()->auth == 1){

    //         view()->composer('*', function ($view) {
    //             if (!Cache::has('admin_side_menu')) {
    //                 Cache::forever('admin_side_menu', );
    //             }
    //             $admin_side_menu = Cache::get('admin_side_menu');

    //             $view->with([
    //                 'admin_side_menu' => $admin_side_menu
    //             ]);
    //         });

    //         }
    //     }
    }
}
