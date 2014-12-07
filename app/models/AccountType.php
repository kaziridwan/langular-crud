<?php

class AccountType extends \Eloquent {
	protected $fillable = ['name'];
    public function accounts()
    {
        return $this->hasMany('Account');
    }
    public function subcategories()
    {
        return $this->hasMany('SubCategory');
    }
}