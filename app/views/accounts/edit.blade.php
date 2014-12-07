@extends('layouts.master')
@section('content')
{{Form::open(['route' => ['accounts.update', $account->id], 'method' => 'put'])}}
{{Form::select('account_type_id',['1'=>'Assest','2'=>'Liability/Credit Card','3'=>'Income','4'=>'Expense','5'=>'Equity'],"$account->account_type_id",['required'=>'required'])}}
{{Form::select('sub_category_id',['0'=>'No Category','1'=>'Fixed Asset','2'=>'Current Asset','3'=>'Short Term Liability','4'=>' Long Term Liability','5'=>'Cost of Goods Sold','6'=>'Operating Expenses','7'=>'Financial Expenses'],"$account->sub_category_id")}}
{{Form::label('name','Account Name')}}
{{Form::text('name',"$account->name",['required'])}}
{{Form::label('description','Description')}}
{{Form::text('description',"$account->description",['required'])}}
<br/>
<br/>
{{Form::submit('Save',['class'=>"btn btn-primary"])}}
<a href="/accounts" class="btn btn-default">Back</a>
{{Form::close()}}
@stop