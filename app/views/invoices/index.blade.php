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

<a class="btn btn-primary" href="<?php echo URL::route('invoices.create'); ?>">Create invoice</a>


<table class="table table-bordered">
    <thead>
    <tr>
        <td>Date</td>
        <td>Number</td>
        <td>Customer</td>
        <td>Amound Due</td>
        <td>Total</td>
        <td>Status</td>
    </tr>
    </thead>
    <tbody>
        @foreach($invoices as $invoice)
            <tr>
                <td>{{$invoice->date}}</td>
                <td>{{$invoice->id}}</td>
                <td>{{$invoice->customer->name}}</td>
                <td>
                    <?php
                        $amount = 0;
                        foreach($invoice->invoice_items as $item) {
                            $amount += $item->quantity * $item->unit_price;
                        }
                        echo $amount - $invoice->amount_paid;
                    ?>
                </td>
                <td>
                    {{$amount}}
                </td>
                <td>
                    <?php
                        $status = '';
                        if($invoice->draft == 1) {
                            $status = 'Saved';
                        } else if (\georgescafe\invoices\InvoiceRepository::calc_due_amount($invoice) <=0) {
                            $status = 'Paid';
                        } else {
                            $status = 'Partially paid';
                        }
                    ?>

                    {{$status}}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


@stop

@section('footer')

@stop