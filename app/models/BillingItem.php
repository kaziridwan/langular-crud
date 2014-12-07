<?php

class BillingItem extends \Eloquent {

	protected $fillable = ['bill_id', 'raw_material_id', 'account_id', 'quantity', 'description', 'unit_price' , 'vat' ];


    public function bill() {
        return $this->belongsTo('Bill');
    }

    public function raw_material() {
        return $this->belongsTo('RawMaterial');
    }

    public function account() {
        return $this->belongsTo('Account');
    }
}