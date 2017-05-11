<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Mockery\Exception;

class RosApiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('rosApi',function (){
            $API = new \RouterosAPI();
            //$API->debug = true;
            if (!$API->connect(env('ROS_HOST'), env('ROS_USER'), env('ROS_PASS'))) {
                throw new Exception('ros init error');
            }
            return $API;
        });
    }
}
