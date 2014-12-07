<?php

class InvoicePayment extends \Eloquent {
	protected $fillable = ['invoice_id', 'payment_date','payment_method','amount'];

    public function invoice() {
        return $this->belongsTo('Invoice');
    }

}