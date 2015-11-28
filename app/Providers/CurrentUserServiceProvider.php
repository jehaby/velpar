<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\User;
use Auth;


class CurrentUserServiceProvider extends ServiceProvider
{


    public function register()
    {
        $this->app->bind(User::class, function ($app) {
            return Auth::user();
        });
    }


}
