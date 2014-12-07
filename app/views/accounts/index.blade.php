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
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
    Add New Account
</button>
<table>
    <thead>
    <tr>
        <td>Name</td>
        <td>Action</td>
    </tr>
    </thead>
    <tbody>

    @foreach($accountTypes as $accountType)
        <tr>
            <td class="types">{{$accountType->name}}</td>
        </tr>
        @if($accountType->name=="Income" || $accountType->name=="Equity" )


            @foreach($accountType->accounts as $account)


                <tr><td class="names">{{$account->name}}</td><td><a href="accounts/{{$account->id}}/edit">Edit</a> &nbsp;  <a href="#" class="delete_button"  data-delete="{{$account->id}}"  data-target="#delete" data-toggle="modal">Delete</a></td></tr>




            @endforeach
        @else
        @foreach($accountType->subcategories as $subcategory)

        <tr>
            <td  class="subcategories">
                {{$subcategory->name}}</td></tr>
                @foreach($accountTypes as $accountType)

                    @foreach($accountType->accounts as $account)

                            @if($account->sub_category_id==$subcategory->id)
                            <tr><td class="names">{{$account->name}}</td><td><a href="accounts/{{$account->id}}/edit">Edit</a> &nbsp;  <a href="#" class="delete_button"  data-delete="{{$account->id}}"  data-target="#delete" data-toggle="modal">Delete</a></td></tr>
                            @endif


                    @endforeach
                @endforeach

            @endforeach

        @endif


    @endforeach

    </tbody>
</table>





<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Account</h4>
            </div>
            <div class="modal-body">
                {{Form::open(['route'=>'accounts.store'])}}
                <select name="account_type_id" id="" required="required">
                    <option value="">Select Account Type</option>
                    @foreach($accountTypes as $accountType)
                    <option value="{{$accountType->id}}">{{$accountType->name}}</option>
                    @endforeach
                </select>
                <br/>
                <select name="sub_category_id" id="" required="required">
                    <option value="">Select Subcategory</option>
                    <option value="0">No Category</option>
                    @foreach($subcategories as $subcategory)
                    <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                    @endforeach
                </select>


                {{Form::label('name','Account Name')}}
                {{Form::text('name','',['required'])}}
                {{Form::label('description','Description')}}
                {{Form::text('description','',['required'])}}
            </div>
            <div class="modal-footer">
                {{Form::submit('Save',['class'=>"btn btn-primary"])}}
                {{Form::close()}}
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Delete Account</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">

                    <h1>Are your sure you want to delete this Account ?</h1>

                </div>
            </div>
            <div class="modal-footer">
                {{Form::open(['route'=>['accounts.destroy'], 'method'=>'delete'])}}

                {{Form::hidden('id','',['id'=>'delete_id'])}}

                {{Form::submit('Delete',['class'=>"btn btn-danger"])}}

                {{Form::close()}}
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@stop

@section('footer')
<script>
    $(".delete_button").click(function(){
        var row=$(this).attr('data-delete');
        $('#delete_id').val(row);
//        console.log(row);
    });
</script>
@stop