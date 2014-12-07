<?php

namespace georgescafe\accounttypes;

use Illuminate\Support\ServiceProvider;

class AccountTypesServiceProvider extends ServiceProvider {

    public function register()
    {
        $app = $this->app;
        $app->bind('georgescafe\accounttypes\IAccountTypesRepository', 'georgescafe\accounttypes\AccountTypesRepository');
    }
}