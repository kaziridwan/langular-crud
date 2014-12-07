<?php

class BillPayment extends \Eloquent {
	protected $fillable = ['bill_id','account_id','amount','memo','date','payment_method'];
}