@extends('layouts.master')
@section('header')
@stop
@section('content')

<a href="{{URL::route('customers.create')}}" class="link">Add a customer</a>
<div class="row">
    <table class="table table-bordered">
        <thead>
            <td>Customer</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Account No</td>
            <td>Email</td>
            <td>Address</td>
            <td colspan="2">Actions</td>
        </thead>
        <tbody>
            @foreach($customers as $customer)
            <tr>
                <td>{{$customer->name}}</td>
                <td>{{$customer->first_name}}</td>
                <td>{{$customer->last_name}}</td>
                <td>{{$customer->account_no}}</td>
                <td>{{$customer->email}}</td>
                <td>{{$customer->address}}</td>
                <td>
                    <a href="{{route('customers.edit', $customer->id)}}">Edit</a>
                </td>
                <td>
                    <a href="{{URL::to('customers/' . $customer->id . '/delete')}}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@stop

@section('footer')


@stop
