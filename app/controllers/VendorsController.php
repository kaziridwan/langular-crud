<?php


use georgescafe\vendors\VendorRepository;
class VendorsController extends \BaseController {


    public function __construct(VendorRepository $vendors) {
        $this->vendors = $vendors;
    }

	/**
	 * Display a listing of the resource.
	 * GET /vendors
	 *
	 * @return Response
	 */
	public function index()
	{
		return $this->vendors->all();
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /vendors/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /vendors
	 *
	 * @return Response
	 */
	public function store()
	{
		return $this->vendors->store();
	}

	/**
	 * Display the specified resource.
	 * GET /vendors/{id}
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
	 * GET /vendors/{id}/edit
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
	 * PUT /vendors/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if($this->vendors->update($id)) {
            return 'success';
        } else {
            return $this->vendors->get_errors();
        }
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /vendors/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}