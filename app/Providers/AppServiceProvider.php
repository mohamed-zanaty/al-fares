<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{

    public function __construct()
    {

    }

    public function register()
    {
        //
    }


    public function boot()
    {

        Schema::defaultStringLength(191);
    }

    public function compose()
    {

    }
}
