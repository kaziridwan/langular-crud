<?php

class Bill extends \Eloquent {

	protected $fillable = ['date','due_date','bill_number','memo', 'vendor_id','approved'];

    public function vendor() {
        return $this->belongsTo('Vendor');
    }

    public function billing_items() {
        return $this->hasMany('BillingItem');
    }

    public function payments() {
        return $this->hasMany('BillPayment');
    }

}