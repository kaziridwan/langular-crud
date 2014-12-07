<?php


use georgescafe\billing\BillPaymentRepository;
use georgescafe\accounts\AccountsRepository;

class BillPaymentsController extends \BaseController {


    public function __construct(BillPaymentRepository $bill_payments, AccountsRepository $accounts) {
        $this->payments = $bill_payments;
        $this->accounts = $accounts;
    }

	/**
	 * Display a listing of the resource.
	 * GET /billpayments
	 *
	 * @return Response
	 */
	public function index($bill_id)
	{
		return $this->payments->get_bill_payments($bill_id);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /billpayments/create
	 *
	 * @return Response
	 */
	public function create($bill_id)
	{
        $accounts = $this->accounts->all();
		$payment_methods = \georgescafe\invoices\InvoicePaymentRepository::$payment_methods;
        return View::make('BillPayments.create',compact('payment_methods', 'accounts'))->with('bill_id',$bill_id);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /billpayments
	 *
	 * @return Response
	 */
	public function store($bill_id)
	{
		//return Input::all();
        $properties = Input::except('_token');
        $properties['bill_id'] = $bill_id;

        if($this->payments->store($properties)) {
            return Redirect::route('bills.index');
        } else {
            return Redirect::back();
        }
	}

	/**
	 * Display the specified resource.
	 * GET /billpayments/{id}
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
	 * GET /billpayments/{id}/edit
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
	 * PUT /billpayments/{id}
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
	 * DELETE /billpayments/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}