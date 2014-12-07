<?php
namespace georgescafe\accounts;


use georgescafe\repositories\Repository;

use \Account;
use \Input;

class AccountsRepository extends Repository implements IAccountsRepository{

    public static $rules = [

    ];

    public static $messages = [];

    function __construct() {
        parent::__construct(new Account);
    }
}