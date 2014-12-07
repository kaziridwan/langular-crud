<?php

use georgescafe\accounttypes\IAccountTypesRepository;

class AccountTypesController extends \AccountsBaseController {

    public static $resource = 'AccountType';

    public function __construct(IAccountTypesRepository $accountType_repository) {
        parent::__construct($accountType_repository);
    }


}