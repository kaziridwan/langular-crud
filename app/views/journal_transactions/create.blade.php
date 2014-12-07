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
<div ng-app="invoice" ng-controller="InvoiceController" class="row">

        <div class="form-group">
            <label for="customer_id">Customer </label>
            <select name="customer_id" ng-model="customer_id">

                <?php foreach($customers as $customer) { ?>
                    <option value="<?php echo $customer->id ?>"><?php echo $customer->name; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label for="name">Date</label>
            <input type="date" name="date" ng-model="date">
        </div>

        <div class="form-group">
            <label for="name">Due Date</label>
            <input type="date" name="due_date" ng-model="due_date"/>
        </div>

        <div class="form-group">
            <label for="memo">Memo</label>
            <textarea ng-model="memo" name="memo" id="" cols="30" rows="10" ng-model="memo"></textarea>
        </div>

        <div class="invoice-items">
            <table class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <td>Product</td>
                        <td>Description</td>
                        <td>Quantity</td>
                        <td>Price</td>
                        <td>Vat</td>
                        <td>Amount</td>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="item in invoice_items">
                        <td>
                            <select ng-model="item.product" ng-options="p.name for p in products"></select>
                        </td>
                        <td>
                            <input type="text" ng-model="item.description">
                        </td>
                        <td>
                            <input type="text" ng-model="item.quantity"/>
                        </td>
                        <td>
                            <input type="text" ng-model="item.product.price"/>
                        </td>
                        <td>
                            <input type="text" ng-model="item.vat">
                        </td>
                        <td>
                            <input type="text" value="<% item_total(item) %>"/>
                        </td>
                    <tr>
                    <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total : </td>
                    <td><% total() %></td>
                    </tr>
                </tbody>
            </table>
            <tfoot><tr><a href="" ng-click="add_line()">Add a line</a></tr></tfoot>

            <button ng-click="save(true)">save as draft</button>
            <button ng-click="save(false)">save</button>
        </div>
</div>

@stop

@section('footer')

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
<script type="text/javascript" src="https://code.angularjs.org/1.2.26/angular-resource.js"></script>
<script type="text/javascript">

    var invoiceApp = angular.module('invoice', ['ngResource'], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });

    invoiceApp.controller('InvoiceController', ['$scope','$http', function($scope,$http){
            $scope.invoice_items = [];

            $http.get('../products').success(function(data){
                $scope.products = data;
            });

            $scope.item_total = function(item) {
                if(item == undefined || item.product == undefined) {
                    return 0;
                }
                return (item.product.price * item.quantity * (item.vat/100)) + (item.product.price * item.quantity);
            }


            $scope.total = function() {
                var t=0;
                angular.forEach($scope.invoice_items, function(value,key){
                    t += $scope.item_total(value);
                });
                return t;
            }


            $scope.add_line = function() {
                $scope.invoice_items.push({quantity:0,vat:0});
            }

            $scope.save = function(draft) {
                var invoice = {
                    memo:$scope.memo,
                    invoice_items : $scope.invoice_items,
                    customer_id : $scope.customer_id,
                    date: $scope.date,
                    due_date:$scope.due_date,
                    draft:draft
                };

                //console.log(invoice);

                
                $http.post('../invoices',invoice).success(function(response){
                    console.log(response);
                    window.location = '<?php echo URL::to('/invoices/');?>' + '/' + response.id;
                });
                

            }
    }]);

</script>
@stop
