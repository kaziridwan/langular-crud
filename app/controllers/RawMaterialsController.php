<?php

use georgescafe\invoices\RawMaterialsRepository as RawMaterials;


class RawMaterialsController extends \BaseController {


    public function __construct(RawMaterials $raw_materials, \georgescafe\accounts\AccountsRepository $accounts) {
        $this->raw_materials = $raw_materials;
        $this->accounts = $accounts;
    }

	/**
	 * Display a listing of the resource.
	 * GET /rawmaterials
	 *
	 * @return Response
	 */
	public function index()
	{
        $raw_materials = $this->raw_materials->all();
        return View::make('raw_materials.index', compact('raw_materials', 'accounts'));

	}

	/**
	 * Show the form for creating a new resource.
	 * GET /rawmaterials/create
	 *
	 * @return Response
	 */
	public function create()
	{
        $accounts = $this->accounts->all();
        return View::make('raw_materials.create', compact('accounts'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /rawmaterials
	 *
	 * @return Response
	 */
    public function store()
    {
        $raw_material = $this->raw_materials->store();
        if($raw_material) {
            return Redirect::route('raw_materials.index');
        }
        return Route::back()->withErrors($this->raw_materials->get_errors());
    }

	/**
	 * Display the specified resource.
	 * GET /rawmaterials/{id}
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
	 * GET /rawmaterials/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$accounts = $this->accounts->all();
        $raw_material = $this->raw_materials->find($id);


        return View::make('raw_materials.edit',compact('accounts', 'raw_material'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /rawmaterials/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if($this->raw_materials->update($id)) {
            if(Request::ajax())
                return 'success';
            return Redirect::route('raw_materials.index');
        } else {
            if(Request::ajax())
                return $this->raw_materials->get_errors();
            return Redirect::back()->withErrors($this->raw_materials->get_errors());
        }
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /rawmaterials/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        if($this->raw_materials->destroy($id)) {
            return Redirect::route('raw_materials.index');
        } else {
            return Redirect::back()->withErrors($this->raw_materials->get_errors());
        }
	}

}