@extends('masterlist.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Masterlist Item</h2>
        </div>
        <div class="pull-right">

            <a class="btn btn-primary" href="{{ route('masterlist.index') }}"> Back</a>
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
   
<form action="{{ route('masterlist.update', $masterlist->id) }}" method="POST">
	@csrf
	@method('PUT')
	
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="listname" value="{{ $masterlist->listname }}" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detail:</strong>
                <textarea class="form-control" style="height:150px" name="description" placeholder="Detail">{{ $masterlist->description }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
			<select class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" id="active" name="active">
				@if ( $masterlist->active <> 1)
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
