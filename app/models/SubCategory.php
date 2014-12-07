<?php

class SubCategory extends \Eloquent {
	protected $fillable = [];

    public function accounts()
    {
        return $this->hasMany('Account','account_id');
    }
    public function accountType()
    {
        return $this->belongsTo('AccountType');
    }
}