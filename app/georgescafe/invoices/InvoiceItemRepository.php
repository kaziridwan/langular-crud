<?php

namespace georgescafe\invoices;
use \InvoiceItem;

class InvoiceItemRepository {


	public function all($invoice_id) {
		return InvoiceItem::where('invoice_id', '=',$invoice_id)->get();
	}



	public function store($prop = null) {

		if($prop == null) {
			$prop = \Input::all();
		}
		InvoiceItem::create($prop);
	}


    public function update($invoice_items, $invoice) {
        foreach($invoice_items as $item) {
            $prop = [
                'invoice_id'    => $invoice->id,
                'description' =>  $item['description'],
                'product_id'    => $item['product']['id'],
                'vat'           => $item['vat'],
                'quantity'  => $item['quantity'],
                'unit_price'    => $item['product']['price']
            ];

            if(isset($item['id'])) {
                //update it.
                $inv_item = InvoiceItem::find($item['id']);
                $inv_item->update($prop);
                $inv_item->save();
            } else {
                $this->store($prop);
            }
        }
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