@extends('template.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Checklist Item</h2>
        </div>
        <div class="pull-right">


            <a class="btn btn-primary" href="{{ route('template.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('template.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>List ID</strong>
                <input type="text" name="id_master_lists" class="form-control" value = "{{ Request::get('list_id') }}" readonly>
            </div>
        </div> 		 
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Order Number</strong>
                <input type="text" name="order_num" class="form-control" value="100">
            </div>
        </div> 
 		 
		 
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Short Description</strong>
                <input type="text" name="item_short_desc" class="form-control" placeholder="Short Description">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Long Description</strong>
                <textarea class="form-control" style="height:150px" name="item_long_desc" placeholder="Detail"></textarea>
            </div>
        </div>
             
        <div class="col-xs-12 col-sm-12 col-md-12">
			<select class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" id="active" name="active">
			  <option value="1">Active</option>
			  <option value="0">Inactive</option>
			</select>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Save Record</button>
        </div>
    </div>
   
</form>
@endsection
