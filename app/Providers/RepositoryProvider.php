<?php

namespace App\Providers;

use App\Repository\Album\AlbumInterfaceRepository;
use App\Repository\Album\AlbumRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(AlbumInterfaceRepository::class,AlbumRepository::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

}
