<?php
namespace georgescafe\products;

use georgescafe\repositories\Repository;
use \Product;

class ProductRepository extends Repository {

    public static $rules = [];
    public static $messages = [];

    public function __construct() {
        parent::__construct(new Product);
    }

    public function all() {
        return Product::with('account')->get();
    }
}
