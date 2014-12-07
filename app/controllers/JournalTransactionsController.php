<?php
use georgescafe\journalTransactions\JournalTransactionRepository;
use georgescafe\journalTransactions\JournalTransactionItemRepository;
use georgescafe\accounts\AccountsRepository;

class JournalTransactionsController extends \BaseController {
	/**
	 * [__construct description]
	 * @param JournalTransactionRepository     $journalTransactions     [description]
	 * @param JournalTransactionItemRepository $journalTransactionItems [description]
	 */
	public function __construct(JournalTransactionRepository $journalTransaction, JournalTransactionItemRepository $journalTransactionItem, AccountsRepository $accounts) {
		$this->journalTransaction= $journalTransaction;
        $this->journalTransactionItem = $journalTransactionItem;
        $this->accounts = $accounts->all();
	}
	/**
	 * Display a listing of journaltransactions
	 *
	 * @return Response
	 */
	public function index()
	{
		$journaltransactions = $this->journalTransaction->all();

		return View::make('journal_transactions.index', compact('journaltransactions'));
	}

	/**
	 * Show the form for creating a new journaltransaction
	 *
	 * @return Response
	 */
	public function create()
	{
		$journaltransactions = $this->journaltransaction->all();

		return View::make('journal_transactions.create', compact('journaltransactions'));
	}

	/**
	 * Store a newly created journaltransaction in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$properties = Input::only('description', 'date');
		// dd($properties);
		$journalTransaction = $this->journalTransaction->store($properties);		
		

        $descriptions = Input::get('item_description');
        // $descriptions   =Input::get('JTDetailDescription');
        $account_id     =Input::get('account_id');
        $debit          =Input::get('debit');
        $credit         =Input::get('credit');
        //it must me an array
        foreach ($descriptions as $index => $description) {
            $item = new JournalTransactionItemRepository();
            
            $itemData = [
                            'description'=>$description,
                            'journal_transaction_id'=> $journalTransaction->id,
                            'account_id'=>$account_id[$index],
                            'debit'=>$debit[$index],
                            'credit'=>$credit[$index]
                            ];
            $item->store($itemData);
        }
        return 'done';
	}

	/**
	 * Display the specified journaltransaction.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$journaltransaction = $this->journalTransaction->find($id);
		// $journalTransactionitems = $journalTransaction->journal_transaction_items;
		// dd($journalTransactionitems[0]);
		return View::make('journal_transactions.show', compact('journaltransaction'));
	}

	/**
	 * Show the form for editing the specified journaltransaction.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$journaltransaction = $this->journalTransaction->find($id);
		$accounts = Account::with('subcategory','accountType')->get();
		// dd($accounts);
		return View::make('journal_transactions.edit', compact('journaltransaction','accounts'));
	}

	/**
	 * Update the specified journaltransaction in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// $journaltransaction = JournalTransaction::findOrFail($id);

		// $validator = Validator::make($data = Input::all(), Journaltransaction::$rules);

		// if ($validator->fails())
		// {
		// 	return Redirect::back()->withErrors($validator)->withInput();
		// }

		// $journaltransaction->update($data);

		return Redirect::route('journal_transactions.index');
	}

	/**
	 * Remove the specified journaltransaction from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		JournalTransaction::destroy($id);

		return Redirect::route('journal_transactions.index');
	}

}
