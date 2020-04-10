@extends('masterlist.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Checklist Manager - Master List</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('masterlist.create') }}"> Create New Master List</a>
            </div>
        </div>
    </div>
   <?php 
		$i = 0;  // initialize increment.
	?>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($masterlist as $ml)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $ml->listname }}</td>
            <td>{{ $ml->description }}</td>
            <td>
				
				@if ( $ml->active <> 1)
				Inactive
				@else
				Active
				@endif
			</td>

            <td>
                
            </td>
        </tr>
        @endforeach
    </table>
  
	{!! $masterlist->links() !!}
      
@endsection
