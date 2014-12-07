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
        Bill to :
        <p>{{$bill->vendor->first_name}} {{$bill->vendor->last_name}}</p>
        <p> {{$bill->vendor->name}}</p>
        <p>{{$bill->vendor->email}}</p>
    </div>
    <div class="col-xs-6">
        <p>bill Number : {{$bill->id}}</p>
        <p>bill date : {{$bill->date}}</p>
        <p>Due date : {{$bill->due_date}}</p>

    </div>
</div>


@stop

@section('footer')


@stop
