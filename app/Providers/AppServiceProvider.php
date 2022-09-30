<?php

namespace App\Providers;

use App\Service\UploadService;
use Illuminate\Support\ServiceProvider;
use App\OSS\OssClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('oss',function ($app,$config){
            return new OssClient();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
