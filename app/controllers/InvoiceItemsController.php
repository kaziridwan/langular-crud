<?php

use georgescafe\invoices\InvoiceRepository;
use georgescafe\invoices\InvoiceItemRepository;

class InvoiceItemsController extends \BaseController {


	public function __construct(InvoiceRepository $invoices, InvoiceItemRepository $invoice_items) {
		$this->invoices = $invoices;
		$this->invoice_items = $invoice_items;
	}


	/**
	 * Display a listing of the resource.
	 * GET /invoiceitems
	 *
	 * @return Response
	 */
	public function index($invoice_id)
	{
		return $this->invoice_items->all($invoice_id);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /invoiceitems/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /invoiceitems
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /invoiceitems/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($invoice_id, $invoice_item_id)
	{
		echo $invoice_id . ' '. $invoice_item_id;
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /invoiceitems/{id}/edit
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
	 * PUT /invoiceitems/{id}
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
	 * DELETE /invoiceitems/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}