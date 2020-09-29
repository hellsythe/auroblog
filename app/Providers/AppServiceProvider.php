<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('breadcrumb', function ($params) {
            return "
            <nav aria-label='breadcrumb'>
              <ol class='breadcrumb'>
                <li class='breadcrumb-item'><a href='{{route('dashboard')}}'>Dashboard</a></li>
                <?php
                    foreach (($params) as \$key =>  \$value) {
                        if(\$key !== '#'){
                            echo \"<li class='breadcrumb-item'><a href='\".route(\$key).\"'>\$value</a></li>\";
                        }else{
                            echo \"<li class='breadcrumb-item active' aria-current='page'>\$value</li>\";
                        }
                    }
                ?>
              </ol>
            </nav>
            ";
        });
    }
}
