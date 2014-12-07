<?php

namespace georgescafe\invoices;
use Illuminate\Support\Facades\Input;
use \Invoice;

class InvoiceRepository {


	public function all() {
		return Invoice::with('invoice_items', 'customer', 'invoice_payments')->get();
	}


	public function store($prop = null) {
		if($prop == null) {
            $prop = Input::all();
		}

		return Invoice::create($prop);
	}

    public function update($invoice_id) {
        $invoice = Invoice::find($invoice_id);
        $prop = Input::all();
        $invoice->date = $prop['date'];
        $invoice->due_date = $prop['due_date'];
        $invoice->memo = $prop['memo'];
        $invoice->customer_id = $prop['customer_id'];
        $invoice->save();
        return $invoice;
    }



	public function find($invoice_id) {
		return Invoice::with('invoice_items', 'invoice_items.product' , 'customer', 'invoice_payments')->find($invoice_id);
	}

    public static function calc_due_amount($invoice) {
        $generated_amount = InvoiceItemRepository::get_total_price($invoice);
        $paid_amount = InvoicePaymentRepository::get_paid_amount($invoice);
        return $generated_amount - $paid_amount;
    }
}