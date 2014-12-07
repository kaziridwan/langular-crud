<?php

use georgescafe\accounts\IAccountsRepository;
use georgescafe\accounts\AccountsRepository;

class AccountsController extends \AccountsBaseController {

    public static $resource = 'Account';

    public function __construct(IAccountsRepository $account_repository,AccountsRepository $account) {
        parent::__construct($account_repository);
        $this->account=$account;
    }

    public function index()
    {

//        $accounts =  Account::with('accounttype', 'subcategory')->get();

        $accountTypes = AccountType::with('subcategories','accounts')->get();
//        return $accountTypes;
        $subcategories=Subcategory::all();
        return View::make('accounts.index',compact('accountTypes','subcategories'));


    }
    public function store()
    {
        $data= Input::except('_token');
        $this->account->store($data);
        return Redirect::back();
    }

    public function destroy($id=null)
    {
        $id=Input::only('id')['id'];
        $this->account->destroy($id);
        return Redirect::back();

    }
    public function edit($id)
    {

        $account=$this->account->find($id);
//        return $account;
        return View::make('accounts.edit',compact('account'));
    }
    public function update($id)
    {
        $this->account->update($id);
        return Redirect::route('accounts.index');
    }
}