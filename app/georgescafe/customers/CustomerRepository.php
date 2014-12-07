<?php

namespace georgescafe\customers;
use \Customer;
use georgescafe\repositories\Repository;

class CustomerRepository extends Repository {

    public static $rules = [];
    public static $messages = [];

    public function __construct() {
        parent::__construct(new Customer());
    }
}