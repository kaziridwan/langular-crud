<?php

namespace georgescafe\billing;
use georgescafe\repositories\Repository;

class BillRepository  extends Repository{

    public static $rules = [];
    public static $messages = [];

    public function __construct() {
        parent::__construct(new \Bill());
    }


    public function all() {
        return \Bill::with('vendor', 'billing_items', 'payments')->get();
    }

    public function find($id) {
            return \Bill::with('vendor')->find($id);
    }

    public function update($id, $properties = null) {
        parent::update($id,$properties);
        //var_dump(\Input::get('billing_items'));
        foreach(\Input::get('billing_items') as $item) {
            $item['unit_price'] = $item['raw_material']['price'];
            $item['raw_material_id'] = $item['raw_material']['id'];
            $item['description'] = $item['raw_material']['description'];
            $item['account_id'] = $item['account']['id'];
            $item['bill_id'] = $id;
            if(isset($item['id'])) {
                $billing_item = \BillingItem::find($item['id']);
                $billing_item->update($item);
                $billing_item->save();
            } else {
                \BillingItem::create($item);
            }
        }
        return true;
    }

    public function store($properties = null) {
        $bill = parent::store();
        if($this->update($bill->id,null)) {
            return $bill;
        }
        return false;
    }


    public static function calc_total_amount($bill) {
        $billing_items = $bill->billing_items;
        $total_amount = 0;

        foreach($billing_items as $item) {
            $amount = $item->unit_price * $item->quantity;
            $vat = $amount * ($item->vat/100);
            $total_amount += ($amount + $vat);
        }

        return $total_amount;
    }


    public static function calc_due_amount($bill) {
        $total = self::calc_total_amount($bill);
        $paid = self::calc_paid_amount($bill);
        return $total- $paid;
    }

    public static function calc_paid_amount($bill) {
        $total_amount = 0;
        foreach($bill->payments as $payment) {
            $total_amount += $payment->amount;
        }
        return $total_amount;
    }

}