<?php

use georgescafe\products\ProductRepository as Products;

class ProductsController extends \BaseController {

	public function __construct(Products $products, \georgescafe\accounts\AccountsRepository $accounts) {
		$this->products = $products;
        $this->accounts = $accounts;
	}

	/**
	 * Display a listing of the resource.
	 * GET /products
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = $this->products->all();
        return View::make('products.index', compact('products'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /products/create
	 *
	 * @return Response
	 */
	public function create()
	{
        $accounts = $this->accounts->all();
        return View::make('products.create', compact('accounts'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /products
	 *
	 * @return Response
	 */
	public function store()
	{
        $product = $this->products->store();
        if($product) {
            return Redirect::route('products.index');
        }
        return Route::back()->withErrors($this->products->get_errors());
	}

	/**
	 * Display the specified resource.
	 * GET /products/{id}
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
	 * GET /products/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$product = $this->products->find($id);
        $accounts = $this->accounts->all();

        return View::make('products.edit', compact('product', 'accounts'));

	}

	/**
	 * Update the specified resource in storage.
	 * PUT /products/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if($this->products->update($id)) {
            return Redirect::route('products.index');
        }
        return Redirect::back()->withErrors($this->products->get_errors());
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /products/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if($this->products->destroy($id)) {
            return Redirect::route('products.index');
        } else {
            return Redirect::back()->withErrors($this->products->get_errors());
        }
	}

}