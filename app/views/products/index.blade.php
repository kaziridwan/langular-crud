@extends('layouts.master')
@section('header')
@stop
@section('content')

<a href="{{URL::route('products.create')}}" class="link">Add a product</a>
<div class="row">
    <table class="table table-bordered">
        <thead>
            <td>Product Name</td>
            <td>Description</td>
            <td>Price</td>
            <td>Account</td>
            <td colspan="2">Actions</td>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->account->name}}</td>
                <td>
                    <a href="{{route('products.edit', $product->id)}}">Edit</a>
                </td>
                <td>
                    <a href="{{URL::to('products/' . $product->id . '/delete')}}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@stop

@section('footer')


@stop
