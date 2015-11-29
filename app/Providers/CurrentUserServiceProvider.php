<?php namespace App\Providers;

use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;
use App\User;
use Auth;


class CurrentUserServiceProvider extends ServiceProvider
{


    protected $defer = true;


    public function register()
    {

        $this->app->when(UserRepository::class)
            ->needs(User::class)
            ->give(function($app) {
                return Auth::check() ? Auth::user() : User::whereId(1)->first();
            });

    }



    public function provides()
    {
        return ['App\User'];
    }


}
