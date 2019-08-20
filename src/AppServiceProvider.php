<?php

namespace Ackosoft\AuthAdapter;

use Ackosoft\AuthAdapter\Models\Client;
use Ackosoft\AuthAdapter\Models\Token;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

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

    public function boot()
    {
        Passport::useTokenModel(Token::class);
        Passport::useClientModel(Client::class);
    }
}
