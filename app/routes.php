<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::resource('accountTypes', 'AccountTypesController');
Route::resource('accounts', 'AccountsController');
Route::resource('sub_categories', 'SubCategoriesController');

Route::resource('products', 'ProductsController');
Route::any('products/{id}/delete','ProductsController@destroy');

Route::resource('customers', 'CustomersController');
Route::any('customers/{id}/delete','CustomersController@destroy');

Route::resource('invoices', 'InvoicesController');
Route::resource('invoices.invoice_items', 'InvoiceItemsController');

Route::resource('journal-transactions', 'JournalTransactionsController');
Route::resource('journal-transactions.items', 'JournalTransactionItemsController');

Route::resource('invoices.invoice_payments', 'InvoicePaymentsController');
Route::resource('invoice_payments', 'InvoicePaymentsController');

Route::resource('raw_materials', 'RawMaterialsController');
Route::any('raw_materials/{id}/delete','RawMaterialsController@destroy');

Route::resource('vendors','VendorsController');
Route::resource('bills', 'BillsController');
Route::resource('bills.billing_items', 'BillingItemsController');

Route::resource('billing_items', 'BillingItemsController');
Route::resource('bills.bill_payments', 'BillPaymentsController');


Route::group(['prefix' => 'api'], function()
{
    Route::get('products', function()
    {
        $products = App::make("georgescafe\products\ProductRepository");
        return $products->all();
    });
    Route::get("raw_materials", function(){
    	$raw_materials = App::make("georgescafe\invoices\RawMaterialsRepository");
    	return $raw_materials->all();
    });
});	
