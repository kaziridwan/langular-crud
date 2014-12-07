@extends('layouts.master')
@section('header')
@stop
@section('content')

<a href="{{URL::route('raw_materials.create')}}" class="link">Add a product</a>
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
            @foreach($raw_materials as $raw_material)
            <tr>
                <td>{{$raw_material->name}}</td>
                <td>{{$raw_material->description}}</td>
                <td>{{$raw_material->price}}</td>
                <td>{{$raw_material->account->name}}</td>
                <td>
                    <a href="{{route('raw_materials.edit', $raw_material->id)}}">Edit</a>
                </td>
                <td>
                    <a href="{{URL::to('raw_materials/' . $raw_material->id . '/delete')}}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@stop

@section('footer')


@stop
