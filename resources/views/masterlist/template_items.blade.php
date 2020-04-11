@extends('template.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Template Manager - List Template Items</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('templatelist.create') }}"> Create New Master List</a>
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
        @foreach ($templatelist as $template)
        <tr>
            <td>{{ ++$i }} / {{ $ml->id }}</td>
            <td>{{ $template->ItemShortDesc }}</td>
            <td>{{ $template->ItemLongDesc }}</td>
            <td>
				
				@if ( $template->active <> 1)
				Inactive
				@else
				Active
				@endif
			</td>
			<td><a class="btn btn-primary" href="{{ route('templatelist.edit',$ml->id) }}">E</a></td>
        </tr>
        @endforeach
    </table>
  
	{!! $masterlist->links() !!}
      
@endsection
