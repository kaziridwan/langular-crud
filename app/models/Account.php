<?php

class Account extends \Eloquent {
	protected $fillable = ['name','description','account_type_id','sub_category_id'   ];
    public function accountType()
    {
        return $this->belongsTo('AccountType', 'account_type_id');
    }
    public function subcategory()
    {
        return $this->belongsTo('SubCategory', 'sub_category_id');
    }
}