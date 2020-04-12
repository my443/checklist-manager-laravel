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
            <th class="w-10">No</th>
            <th class="w-30">Name</th>
            <th class="w-40">Details</th>
            <th class="w-10">Action</th>
            <th class="w-10">-</th>
        </tr>
        @foreach ($masterlist as $ml)
        <tr>
            <td>{{ ++$i }} / {{ $ml->id }}</td>
            <td>{{ $ml->listname }}</td>
            <td>{{ $ml->description }}</td>
            <td>
				
				@if ( $ml->active <> 1)
				Inactive
				@else
				Active
				@endif
			</td>
			<td><a class="btn btn-primary" href="{{ route('masterlist.edit',$ml->id) }}">E</a>
				<a class="btn btn-success" href="{{ route('template.index', ['list_id' => $ml->id]) }}">Items</a>
				<a class="btn btn-success" href="{{ route('used.index', ['list_id' => $ml->id]) }}">Used</a>
				</td>
        </tr>
        @endforeach
    </table>
  
	{!! $masterlist->links() !!}
      
@endsection
