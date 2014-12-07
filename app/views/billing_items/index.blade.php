@extends('layouts.master')
@section('header')
@stop
@section('content')

<a href="{{URL::route('billing_items.create')}}" class="link">Add a billing_item</a>
<div class="row">
    <table class="table table-bordered">
        <thead>
            <td>Item</td>
            <td>Quantity</td>
            <td>Description</td>
            <td>Unit price</td>
            <td>Vat</td>
            <td>Bill</td>
            <td colspan="2">Actions</td>
        </thead>
        <tbody>
            @foreach($billing_items as $billing_item)
            <tr>
                <td>{{$billing_item->name}}</td>
                <td>{{$billing_item->first_name}}</td>
                <td>{{$billing_item->last_name}}</td>
                <td>{{$billing_item->account_no}}</td>
                <td>{{$billing_item->email}}</td>
                <td>{{$billing_item->address}}</td>
                <td>
                    <a href="{{route('billing_items.edit', $billing_item->id)}}">Edit</a>
                </td>
                <td>
                    <a href="{{URL::to('billing_items/' . $billing_item->id . '/delete')}}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@stop

@section('footer')


@stop
