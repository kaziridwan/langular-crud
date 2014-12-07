<?php

use georgescafe\invoices\InvoicePaymentRepository;
use georgescafe\accounts\AccountsRepository as Account;

class InvoicePaymentsController extends \BaseController {

    public function __construct(InvoicePaymentRepository $payments, Account $accounts) {
        $this->payments = $payments;
        $this->accounts = $accounts;
    }

	/**
	 * Display a listing of the resource.
	 * GET /invoicepayments
	 *
	 * @return Response
	 */
	public function index()
	{
		return $this->payments->all();
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /invoicepayments/create
	 *
	 * @return Response
	 */
	public function create($invoice_id)
	{
        $accounts = $this->accounts->all();
        $payment_methods = InvoicePaymentRepository::$payment_methods;
        return View::make('invoice_payments.create',compact('accounts','payment_methods'))->with('invoice_id',$invoice_id);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /invoicepayments
	 *
	 * @return Response
	 */
	public function store($id)
	{
        //return Input::all();
        $prop = Input::all();
        $prop['invoice_id'] = $id;
		$payment =  $this->payments->store($prop);
        if($payment != null) {
            return Redirect::route('invoices.show',$id);
        } else {
            return Redirect::back();
        }
	}

	/**
	 * Display the specified resource.
	 * GET /invoicepayments/{id}
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
	 * GET /invoicepayments/{id}/edit
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
	 * PUT /invoicepayments/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if($this->payments->update($id)) {
            echo 'updated';
        } else {
            return $this->payments->get_errors();
        }
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /invoicepayments/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return $this->payments->destroy($id);
	}

}