<?php

class Invoice extends \Eloquent {

	protected $fillable = ['date','due_date','memo','draft','customer_id'];

    public function invoice_items() {
        return $this->hasMany("InvoiceItem");
    }

    public function customer() {
        return $this->belongsTo('customer');
    }


    public function invoice_payments() {
        return $this->hasMany("InvoicePayment");
    }
}