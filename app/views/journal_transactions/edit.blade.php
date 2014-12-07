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
<div ng-app="journalTransaction" ng-controller="appController" class="row">

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" ng-model="description">
        </div>

        <div class="form-group">
            <label for="name">Date</label>
            <input type="text" name="date" ng-model="date"/>
        </div>

        <div class="invoice-items">
            <table class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <td>Account</td>
                        <td>Description</td>
                        <td>Debit</td>
                        <td>Credit</td>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="item in items">
                        <td>
                            <select ng-model="accounts[ [[item.account_id]] ]" ng-options="acc as acc.name for acc in accounts track by acc.id"></select>
                        </td>
                        <td>
                            <input type="text" ng-model="item.description">
                        </td>
                        <td>
                            <input type="text" ng-model="item.credit"/>
                        </td>
                        <td>
                            <input type="text" ng-model="item.debit"/>
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

    var app = angular.module('journalTransaction', ['ngResource'], function($interpolateProvider) {
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
    });

    app.controller('appController', ['$scope','$http','filterFilter', function($scope,$http){
            $scope.description = '{{$journaltransaction->description}}';
            $scope.date = '{{$journaltransaction->date}}';
            $scope.items = {{json_encode($journaltransaction->journal_transaction_items)}};

			$scope.accounts = {{json_encode($accounts)}};  
			$scope.selectedOption = $scope.accounts[4];          
            // $http.get('../products').success(function(data){
            //     $scope.products = data;
            // });
    		$scope.items.default = function (){
    			$scope.accounts.forEach(this.parent.account_id)
    		};
            $scope.add_line = function() {
                $scope.items.push({description:'',credit:0,debit:0});
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
