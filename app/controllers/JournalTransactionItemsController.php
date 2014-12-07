<?php
use georgescafe\journalTransactions\JournalTransactionRepository;
use georgescafe\journalTransactions\JournalTransactionItemRepository;

class JournalTransactionItemsController extends \BaseController {
	/**
	 * [__construct description]
	 * @param JournalTransactionRepository     $journalTransactions     [description]
	 * @param JournalTransactionItemRepository $journalTransactionItems [description]
	 */
	public function __construct(JournalTransactionRepository $journalTransactions, JournalTransactionItemRepository $journalTransactionItems) {
		$this->journalTransactions = $journalTransactions;
        $this->journalTransactionItems = $journalTransactionItems;
	}
	/**
	 * Display a listing of the resource.
	 * GET /journal-transactions.items
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /journal-transactions.items/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /journal-transactions.items
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /journal-transactions.items/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /journal-transactions.items/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /journal-transactions.items/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /journal-transactions.items/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}