<?php

class RawMaterial extends \Eloquent {
	protected $fillable = ['account_id', 'name', 'description', 'price'];


    public function account() {
        return $this->belongsTo('Account');
    }
}