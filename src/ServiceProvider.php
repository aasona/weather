<?php
/**
 * Created by PhpStorm.
 * User: yuanHb
 * Date: 2020/3/7
 * Time: 17:21
 */


namespace aasona\weather;


class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->singleton(Weather::class, function(){
            return new Weather(config('services.weather.key'));
        });

        $this->app->alias(Weather::class, 'weather');
    }

    public function provides()
    {
        return [Weather::class, 'weather'];
    }
}