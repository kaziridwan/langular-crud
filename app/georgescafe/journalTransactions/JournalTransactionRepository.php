<?php

namespace georgescafe\journalTransactions;
//namespace should be camelcased
use \JournalTransaction;
use georgescafe\journalTransactions\JournalTransactionItemRepository;
use georgescafe\repositories\Repository;

class JournalTransactionRepository extends Repository{
	public static $rules = [];
    public static $messages = [];

	public function __construct() {
        parent::__construct(new \JournalTransaction());
    }

	public function all() {
		return JournalTransaction::all();
	}
	public function find($id) {
		return JournalTransaction::with('journal_transaction_items')->find($id);
	}

	

}