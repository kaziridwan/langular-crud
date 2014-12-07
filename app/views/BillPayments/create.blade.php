@extends('layouts.master')
@section('header')
<style>
    .types{
        font-weight: bold;
        font-size: 20px;
    }
    .subcategories{
        font-weight: bolder;
        padding-left: 5%;
        font-size: 18px;
    }
    .names{
        padding-left: 10%;
        font-size: 16px;
    }
    table{
        width: 50%;
    }
    thead{
        font-size:18px;
    }
</style>


@stop
@section('content')

<div class="row">
    <div class="col-xs-6">
        {{Form::open(['url' => URL::route('bills.bill_payments.store',$bill_id),'method'=>'post']);}}
            <div class="form-group">
                <label for="payment_date">Payment date</label>
                <input type="date" name="payment_date" class="form-element"/>
            </div>
            <div class="form-group">
                <label for="account_id">Payment account</label>
                <select name="account_id">
                    @foreach($accounts as $account)
                        <option value="{{$account->id}}">{{$account->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="payment_method">Payment method</label>
                <select name="payment_method">
                    @foreach($payment_methods as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="text" name="amount"/>
            </div>
            <div class="form-group">
                <label for="memo">Memo : </label>
                <textarea name="memo" id="" cols="30" rows="10"></textarea>
            </div>
            <input type="submit" value="Submit"/>
        {{Form::close();}}
    </div>
</div>


@stop

@section('footer')


@stop
