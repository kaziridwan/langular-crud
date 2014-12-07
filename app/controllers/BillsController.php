<?php


use georgescafe\billing\BillRepository;
use georgescafe\vendors\VendorRepository;
use georgescafe\accounts\AccountsRepository;

class BillsController extends \BaseController {

    public function __construct(BillRepository $bills, VendorRepository $vendors, AccountsRepository $accounts) {
        $this->bills = $bills;
        $this->vendors = $vendors;
        $this->accounts = $accounts;
    }


	/**
	 * Display a listing of the resource.
	 * GET /bills
	 *
	 * @return Response
	 */
	public function index()
	{
        $bills = $this->bills->all();
        return View::make('bills.index', compact('bills'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /bills/create
	 *
	 * @return Response
	 */
	public function create()
	{
        $accounts = $this->accounts->all();
        $vendors = $this->vendors->all();
        return View::make('bills.create',compact('accounts','vendors'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /bills
	 *
	 * @return Response
	 */
	public function store()
	{

		return $this->bills->store();
	}

	/**
	 * Display the specified resource.
	 * GET /bills/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$bill =  $this->bills->find($id);
        return View::make('bills.show', compact('bill'));
	}



	/**
	 * Show the form for editing the specified resource.
	 * GET /bills/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $accounts = $this->accounts->all();
        $vendors = $this->vendors->all();
        $bill =  $this->bills->find($id);
        return View::make('bills.edit', compact('bill','vendors', 'accounts'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /bills/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        if($this->bills->update($id)) {
            return 'success';
        } else {
            return $this->bills->get_errors();
        }
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /bills/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}