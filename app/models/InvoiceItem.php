<?php

class InvoiceItem extends \Eloquent {
	protected $fillable = ['invoice_id','product_id','quantity','description','unit_price', 'vat'];

    public function product() {
        return $this->belongsTo("Product");
    }
}