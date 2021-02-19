<?php

namespace App\Providers;


use App\Services\Common\V1\Support\FileService;
use App\Services\Common\V1\Support\impl\FileServiceImpl;

use App\Services\Common\V1\Support\impl\SmsServiceImpl;
use App\Services\Common\V1\Support\SmsService;
use Illuminate\Support\ServiceProvider;

class SystemServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */

    public function register()
    {

        $this->app->bind(FileService::class, function ($app) {
            return new FileServiceImpl();
        });
        $this->app->bind(SmsService::class, function ($app) {
            return new SmsServiceImpl();
        });

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
