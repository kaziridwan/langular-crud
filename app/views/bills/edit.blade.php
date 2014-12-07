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
<div ng-app="bill" ng-controller="billController" class="row container">

        <div class="form-group">
            <label for="vendor_id">vendor </label>
            <select name="vendor_id" ng-model="vendor_id">

                <?php foreach($vendors as $vendor) { ?>
                    <option value="<?php echo $vendor->id ?>"><?php echo $vendor->name; ?></option>
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

        <div class="bill-items">
            <table class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <td>Product</td>
                        <td>Expense account</td>
                        <td>Description</td>
                        <td>Quantity</td>
                        <td>Price</td>
                        <td>Vat</td>
                        <td>Amount</td>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="item in billing_items">
                        <td>
                            <select ng-model="item.raw_material" ng-options="p.name for p in raw_materials"></select>
                        </td>
                        <td>
                            <select ng-model="item.account" ng-options ="a.name for a in accounts"></select>
                        </td>
                        <td>
                            <input type="text" ng-model="item.raw_material.description">
                        </td>
                        <td>
                            <input type="text" ng-model="item.quantity"/>
                        </td>
                        <td>
                            <input type="text" ng-model="item.raw_material.price"/>
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
                    <td></td>
                    <td>Total : </td>
                    <td><% total() %></td>
                    </tr>
                </tbody>
            </table>
            <tfoot><tr><a href="" ng-click="add_line()">Add a line</a></tr></tfoot>

            <button ng-click="save(false)">save</button>
        </div>
</div>

<div class="row">
    <table class="table-responsive table-bordered">
        <thead>
            <td>Payment date</td>
            <td>Payment method</td>
            <td>Amount</td>
            <td>Actions</td>
        </thead>
        <tbody>
            @foreach($bill->payments as $payment)
                <tr>
                    <td>{{$payment->payment_date}}</td>
                    <td>{{$payment->payment_method}}</td>
                    <td>{{$payment->amount}}</td>
                    <td>later</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@stop

@section('footer')

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
<script type="text/javascript" src="https://code.angularjs.org/1.2.26/angular-resource.js"></script>
<script type="text/javascript">

    var billApp = angular.module('bill', ['ngResource'], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });

    billApp.controller('billController', ['$scope','$http', function($scope,$http){
            {{'$scope.vendor_id = '. $bill->vendor->id . ';'}}
            $scope.date = '{{$bill->date}}';
            $scope.due_date = "{{$bill->due_date}}";
            $scope.memo = "{{$bill->memo}}";

            {{'$scope.accounts = '. $accounts->toJson(); }}


            //get the items for this bill
            $http.get('../../raw_materials').success(function(data){
                $scope.raw_materials = data;
                //get the items for this bill
                $http.get('../../bills/{{$bill->id}}/billing_items').success(function(items){
                    $scope.billing_items = items;

                    //for each items fix raw material select
                    angular.forEach($scope.billing_items,function(item,index){
                        angular.forEach($scope.raw_materials, function(raw_material,index){
                            if(raw_material.id == item.raw_material_id) {
                                var description = item.description;
                                item.raw_material = raw_material;
                                item.raw_material.price = item.unit_price;
                                item.raw_material.description = description;
                            }
                        });
                    });

                    //for each items fix expense account select.
                    angular.forEach($scope.billing_items,function(item,index){
                        angular.forEach($scope.accounts, function(account,index){
                            if(account.id == item.account_id) {
                                item.account = account;
                            }
                        });
                    });

                });
            });




            $scope.item_total = function(item) {
                if(item == undefined || item.raw_material == undefined) {
                    return 0;
                }
                return (item.raw_material.price * item.quantity * (item.vat/100)) + (item.raw_material.price * item.quantity);
            }


            $scope.total = function() {
                var t=0;
                angular.forEach($scope.billing_items, function(value,key){
                    t += $scope.item_total(value);
                });
                return t;
            }

            $scope.add_line = function() {
                $scope.billing_items.push({quantity:0,vat:0});
            }

            $scope.save = function(draft) {
                var bill = {
                    memo:$scope.memo,
                    billing_items : $scope.billing_items,
                    vendor_id : $scope.vendor_id,
                    date: $scope.date,
                    due_date:$scope.due_date,
                    draft:draft
                };

                //console.log(bill);

                $http.put('../{{$bill->id}}',bill).success(function(response){
                    console.log(response);
                    window.location = '<?php echo URL::to('/bills/'.$bill->id.'/edit');?>';
                });
            }
    }]);

</script>
@stop
