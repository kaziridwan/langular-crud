<?php
namespace georgescafe\accounttypes;


use georgescafe\repositories\Repository;

use \AccountType;
use \Input;

class AccountTypesRepository extends Repository implements IAccountTypesRepository{

    public static $rules = [

    ];


    public static $messages = [];



    function __construct() {
        parent::__construct(new AccountType);
    }
}