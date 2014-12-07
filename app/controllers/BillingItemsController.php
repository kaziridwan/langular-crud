<?php


use georgescafe\billing\BillingItemRepository;

class BillingItemsController extends \BaseController {

    public function __construct(BillingItemRepository $billing_items) {
        $this->billing_items = $billing_items;
    }


	/**
	 * Display a listing of the resource.
	 * GET /billingitems
	 *
	 * @return Response
	 */
	public function index($invoice_id = -1)
	{
		$billing_items = $this->billing_items->all($invoice_id);
        return View::make('billing_items.index', compact('billing_items'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /billingitems/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /billingitems
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /billingitems/{id}
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
	 * GET /billingitems/{id}/edit
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
	 * PUT /billingitems/{id}
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
	 * DELETE /billingitems/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}