<?php

class JournalTransaction extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['description','date'];

	public function journal_transaction_items() {
        return $this->hasMany("JournalTransactionItem");
    }
}