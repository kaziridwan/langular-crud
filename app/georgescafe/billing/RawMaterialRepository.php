<?php
/**
 * Created by PhpStorm.
 * User: anik
 * Date: 11/15/14
 * Time: 9:49 PM
 */

namespace georgescafe\invoices;
use georgescafe\repositories\Repository;

class RawMaterialsRepository extends Repository {

    public function __construct() {
        parent::__construct(new \RawMaterial());
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

    public function all() {
        return \RawMaterial::with('account')->get();
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