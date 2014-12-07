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
        <p>{{$invoice->customer->first_name}} {{$invoice->customer->last_name}}</p>
        <p> {{$invoice->customer->name}}</p>
        <p>{{$invoice->customer->email}}</p>
    </div>
    <div class="col-xs-6">
        <p>Invoice Number : {{$invoice->id}}</p>
        <p>Invoice date : {{$invoice->date}}</p>
        <p>Due date : {{$invoice->due_date}}</p>
        <p>Amount due : {{\georgescafe\invoices\InvoiceRepository::calc_due_amount($invoice)}}</p>
    </div>
</div>


<div class="row">
    <a class="btn btn-primary pull-right" href="<?php echo URL::route('invoices.invoice_payments.create',$invoice->id);?>">add a payment</a>a
    <table class="table table-responsive table-bordered">
        <thead>
            <td>Product</td>
            <td>Qty</td>
            <td>Price</td>
            <td>Vat</td>
            <td>Amount</td>
        </thead>
        <tbody>
            @foreach($invoice->invoice_items as $invoice_item)
                <tr>
                    <td>{{$invoice_item->product->name}}</td>
                    <td>{{$invoice_item->quantity}}</td>
                    <td>{{$invoice_item->unit_price}}</td>
                    <td>{{$invoice_item->vat}}</td>
                    <td>{{\georgescafe\invoices\InvoiceItemRepository::calc_invoice_item_price($invoice_item)}}</td>
                </tr>
            @endforeach
            <tr>
                <td>
                    {{$invoice->memo}}
                </td>
                <td></td>
                <td></td>
                <td>Total</td>
                <td>
                    {{\georgescafe\invoices\InvoiceItemRepository::get_total_price($invoice)}}
                </td>
            </tr>
            <tr>
                <td></td><td></td><td></td>
                <td>Total paid : </td>
                <td>{{\georgescafe\invoices\InvoicePaymentRepository::get_paid_amount($invoice)}}</td>
            </tr>
            <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><h3>Amount due : </h3></td>
            <td><h3>{{\georgescafe\invoices\InvoiceRepository::calc_due_amount($invoice)}}</h3></td>
            </tr>
        </tbody>
    </table>
</div>


<div class="row">
    <div class="table">
        <table class="table-responsive table-bordered">
            <thead>
                <td>Payment date</td>
                <td>Payment method</td>
                <td>Amount</td>
                <td>actions</td>
            </thead>
            <tbody>
                @foreach($invoice->invoice_payments as $payment)
                    <tr>
                        <td>{{$payment->payment_date}}</td>
                        <td>{{$payment->payment_method}}</td>
                        <td>{{$payment->amount}}</td>
                        <td>actions</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

@section('footer')


@stop
