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

<a class="btn btn-primary" href="<?php echo URL::route('bills.create'); ?>">Create bill</a>


<table class="table table-bordered">
    <thead>
    <tr>
        <td>Date</td>
        <td>Number</td>
        <td>Customer</td>
        <td>Amound Due</td>
        <td>Total</td>
    </tr>
    </thead>
    <tbody>
        @foreach($bills as $bill)
            <tr>
                <td>{{$bill->date}}</td>
                <td>{{$bill->id}}</td>
                <td>{{$bill->vendor->name}}</td>
                <td>{{\georgescafe\billing\BillRepository::calc_due_amount($bill)}}</td>
                <td>{{\georgescafe\billing\BillRepository::calc_total_amount($bill)}}</td>
                <td><a href="{{URL::route('bills.bill_payments.create',$bill->id);}}">add payment</a></td>
            </tr>
        @endforeach
    </tbody>
</table>


@stop

@section('footer')

@stop