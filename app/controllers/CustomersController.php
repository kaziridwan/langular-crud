<?php


use georgescafe\customers\CustomerRepository;

class CustomersController extends \BaseController {


	public function __construct(CustomerRepository $customers) {
		$this->customers = $customers;
	}


	/**
	 * Display a listing of the resource.
	 * GET /customers
	 *
	 * @return Response
	 */
	public function index()
	{
		$customers = $this->customers->all();
        return View::make('customers.index', compact('customers'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /customers/create
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('customers.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /customers
	 *
	 * @return Response
	 */
	public function store()
	{
        $customer = $this->customers->store();
        if($customer) {
            return Redirect::back();
        }
        return Redirect::back()->withErrors($this->customers->get_errors());
	}

	/**
	 * Display the specified resource.
	 * GET /customers/{id}
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
	 * GET /customers/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$customer = $this->customers->find($id);
        return View::make('customers.edit', compact('customer'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /customers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if($this->customers->update($id)) {
            return Redirect::route('customers.index');
        } else {
            return Redirect::back()->withErrors($this->customers->get_errors());
        }
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /customers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if($this->customers->destroy($id)) {
            return Redirect::route('customers.index');
        } else {
            return Redirect::back()->withErrors($this->customers->get_errors());
        }
	}

}