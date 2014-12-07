<?php

namespace georgescafe\billing;
use \BillingItem;

class BillingItemRepository {


	public function all($invoice_id = -1) {
        $billing_items = [];

        if($invoice_id == -1)
            $billing_items = BillingItem::with('bill', 'account', 'raw_material')->get();
        else
		    $billing_items = BillingItem::where('bill_id', '=',$invoice_id)->with('bill', 'account', 'raw_material')->get();

        return $billing_items;
	}




    public static function calc_invoice_item_price($invoice_item) {
        $amount = $invoice_item->quantity * $invoice_item->unit_price;
        $vat = $amount*($invoice_item->vat/100);
        return $amount + $vat;
    }



    public static function get_total_price($invoice) {
        $price = 0;
        foreach($invoice->invoice_items as $i) {
            $price += static::calc_invoice_item_price($i);
        }
        return $price;
    }

}