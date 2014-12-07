<?php

namespace georgescafe\vendors;
use georgescafe\repositories\Repository;
use \Vendor;



class VendorRepository extends Repository {

    public function __construct() {
        parent::__construct(new Vendor());
    }
}