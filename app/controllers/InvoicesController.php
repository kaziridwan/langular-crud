<?php

use georgescafe\invoices\InvoiceRepository;
use georgescafe\customers\CustomerRepository;
use georgescafe\accounts\AccountsRepository;

class InvoicesController extends \BaseController {

	public function __construct(InvoiceRepository $invoices, CustomerRepository $customers, \georgescafe\invoices\InvoiceItemRepository $invoice_items, AccountsRepository $accounts) {
		$this->invoices = $invoices;
        $this->customers = $customers;
        $this->invoice_items = $invoice_items;
        $this->accounts = $accounts;
	}

	/**
	 * Display a listing of the resource.
	 * GET /invoices
	 *
	 * @return Response
	 */
	public function index()
	{
		$invoices = $this->invoices->all();
        return View::make('invoices.index', compact('invoices'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /invoices/create
	 *
	 * @return Response
	 */
	public function create()
	{
        $customers = $this->customers->all();
		return View::make('invoices.create', compact('customers'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /invoices
	 *
	 * @return Response
	 */
	public function store()
	{
		$invoice = $this->invoices->store();

        $inv_items = Input::get('invoice_items');
        foreach($inv_items as $item) {
            $prop = [
                'invoice_id'    => $invoice->id,
                'description' => $item['description'],
                'product_id'    => $item['product']['id'],
                'vat'           => $item['vat'],
                'quantity'  => $item['quantity'],
                'unit_price'    => $item['product']['price']
            ];
            $this->invoice_items->store($prop);
        }
        return $invoice;
	}


	/**
	 * Display the specified resource.
	 * GET /invoices/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		$invoice =  $this->invoices->find($id);
        //return $invoice;
		return View::make('invoices.show', compact('invoice', 'accounts'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /invoices/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $customers = $this->customers->all();
		$invoice = $this->invoices->find($id);
        return View::make('invoices.edit',compact('invoice','customers'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /invoices/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        //update the invoice.
        //Input::get('invoice_items');
        $invoice = $this->invoices->update($id);
        $this->invoice_items->update(Input::get('invoice_items'),$invoice);
		return $invoice;
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /invoices/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}