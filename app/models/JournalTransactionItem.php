<?php

class JournalTransactionItem extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['description','account_id','journal_transaction_id','credit','debit'];

	public function journal_transaction() {
        return $this->belongsTo('JournalTransaction');
    }
}