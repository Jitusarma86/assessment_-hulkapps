<?php

namespace App\Providers;

use App\MyLibrary\Moni;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;

class MoniServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Moni::class, function () {
            return new Moni(1);
        });
    }

public function provides(): array
{
    return [Moni::class];
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
