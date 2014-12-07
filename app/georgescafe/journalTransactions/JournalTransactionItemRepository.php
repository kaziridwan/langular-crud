<?php

namespace georgescafe\journalTransactions;
use \JournalTransactionItem;
use georgescafe\repositories\Repository;

class JournalTransactionItemRepository extends Repository{
	public static $rules = [];
    public static $messages = [];
    
	public function __construct() {
        parent::__construct(new \JournalTransactionItem());
    }



}