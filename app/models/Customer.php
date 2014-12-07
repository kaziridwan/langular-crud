<?php

class Customer extends \Eloquent {
	protected $fillable = ['name', 'first_name', 'last_name', 'account_no', 'email', 'address'];
}