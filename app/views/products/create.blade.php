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
        {{Form::open(['url' => URL::route('products.store'),'method'=>'post']);}}
            <div class="form-group">
                <label for="name">Name : </label>
                <input type="text" name="name"/>
            </div>
            <div class="form-group">
                <label for="description">Description  : </label>
                <input type="text" name="description"/>
            </div>
            <div class="form-group">
                <label for="price">Price : </label>
                <input type="text" name="price"/>
            </div>
            <div class="form-group">
                <label for="account_id">Account </label>
                <select name="account_id" id="">
                    @foreach($accounts as $account)
                        <option value="{{$account->id}}">{{$account->name}}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" value="Submit"/>
        {{Form::close();}}
    </div>
</div>


@stop

@section('footer')


@stop
