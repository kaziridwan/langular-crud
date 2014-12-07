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
<?php //dd($journaltransaction) ?>
<div class="row">
    <div class="col-xs-6">
        Description: {{$journaltransaction->description}} <a href="<?php echo URL::route('journal-transactions.edit',$journaltransaction->id);?>">(edit)</a>
        
    </div>
    <div class="col-xs-6">
        Date : {{$journaltransaction->date}}
    </div>
</div>


<div class="row">
    <a class="btn btn-primary pull-right" href="<?php echo URL::route('invoices.invoice_payments.create',$journaltransaction->id);?>">add a payment</a>
    <table class="table table-responsive table-bordered">
        <thead>
            <td>Account</td>
            <td>Description</td>
            <td>Credit</td>
            <td>Debit</td>
        </thead>
        <tbody>
            @foreach($journaltransaction->journal_transaction_items as $item)
                <tr>
                    <td>{{$item->account}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->credit}}</td>
                    <td>{{$item->debit}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@stop

@section('footer')


@stop
