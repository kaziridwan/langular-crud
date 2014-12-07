<?php

namespace georgescafe\accounts;

use Illuminate\Support\ServiceProvider;

class AccountsServiceProvider extends ServiceProvider {

    public function register()
    {
        $app = $this->app;
        $app->bind('georgescafe\accounts\IAccountsRepository', 'georgescafe\accounts\AccountsRepository');
    }
}