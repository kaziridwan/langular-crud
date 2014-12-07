<?php
/**
 * Created by PhpStorm.
 * User: anik
 * Date: 11/15/14
 * Time: 9:49 PM
 */

namespace georgescafe\billing;
use georgescafe\repositories\Repository;

class BillPaymentRepository extends Repository {
    public function __construct() {
        parent::__construct(new \BillPayment());
    }

    public static $rules = [];
    public static $messages = [];

    public static $payment_methods = [
        'bank_transfer' => 'Bank Transfer',
        'cheque'    => 'Cheque',
        'cash'  => 'Cash',
        'credit_card' => 'Credit Card',
        'paypal' => 'Paypal',
        'bkash' => 'Bkash',
        'other' => 'Other'
    ];

    public function get_bill_payments($bill_id) {
        return \BillPayment::where('bill_id','=',$bill_id)->get();
    }

    public function all() {
        return parent::all();
    }

    public function store($properties = null) {
        return parent::store($properties);
    }



    public static function get_paid_amount($invoice) {
        $payments = $invoice->invoice_payments;
        $amount =0;
        foreach($payments as $payment) {
            $amount += $payment->amount;
        }
        $invoice->draft = false;
        $invoice->update();
        return $amount;
    }
}