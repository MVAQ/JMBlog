<?php

namespace JMApp\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;
use Illuminate\Support\Facades\DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Blade::directive('set', function ($e){
            list($name,$val)=explode(',',$e);
            return "<?php $name = $val ?>";
                    });

        DB::listen(function ($query){
//            echo '<h1>'.$query->sql.'</h1>';

        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
