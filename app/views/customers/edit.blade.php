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
        {{Form::open(['url' => URL::route('customers.update', $customer->id),'method'=>'put']);}}
            <div class="form-group">
                <label for="first_name">First Name : </label>
                <input type="text" name="first_name" value="{{$customer->first_name}}"/>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name : </label>
                <input type="text" name="last_name" value="{{$customer->last_name}}"/>
            </div>
            <div class="form-group">
                <label for="name">Name : </label>
                <input type="text" name="name" value="{{$customer->name}}"/>
            </div>
            <div class="form-group">
                <label for="account_no">Account No : </label>
                <input type="text" name="account_no" value="{{$customer->account_no}}"/>
            </div>
            <div class="form-group">
                <label for="email">Email : </label>
                <input type="text" name="email" value="{{$customer->email}}"/>
            </div>
            <div class="form-group">
                <label for="address">Address : </label>
                <textarea name="address" id="" cols="30" rows="10" >{{$customer->address}}</textarea>
            </div>            
            <input type="submit" value="Submit"/>
        {{Form::close();}}
    </div>
</div>


@stop

@section('footer')


@stop
