 @extends('template.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Checklist Item</h2>
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
   
<form action="{{ route('template.update', $template->id) }}" method="POST">
	@csrf
	@method('PUT')
  
     <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>List ID</strong>
                <input type="text" name="id_master_lists" class="form-control" value = "{{ $template->id_master_lists }}" readonly>
            </div>
        </div> 		 
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Order Number</strong>
                <input type="text" name="order_num" class="form-control" value="{{ $template->order_num }}">
            </div>
        </div> 
 		 
		 
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Short Description</strong>
                <input type="text" name="item_short_desc" class="form-control" placeholder="Short Description" value="{{ $template->item_short_desc }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Long Description</strong>
                <textarea class="form-control" style="height:150px" name="item_long_desc" placeholder="Detail">{{ $template->item_long_desc }}</textarea>
            </div>
        </div>
             
        <div class="col-xs-12 col-sm-12 col-md-12">
			<select class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" id="active" name="active">
				@if ( $template->active <> 1)
				  <option value="1">Active</option>
				  <option value="0" selected="selected">Inactive</option>
				@else
				  <option value="1" selected="selected">Active</option>
				  <option value="0">Inactive</option>
				@endif

			</select>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Save Record</button>
        </div>
    </div>
   
</form>
@endsection
