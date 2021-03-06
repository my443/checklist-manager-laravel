@extends('template.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Template Manager - List Template Items</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-info" href="{{ route('masterlist.index') }}"> Master List</a>
            </div>            
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('template.create', ['list_id' => Request::get('list_id')]) }}"> New Template Item</a>
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
            <th class="w-5">No</th>
            <th class="w-5">Order</th>
            <th class="w-30">Name</th>
            <th class="w-46">Details</th>
            <th class="w-10">Action</th>
            <th class="w-2">-</th>
            <th class="w-2">-</th>
        </tr>
        @foreach ($templatelist as $template)
        <tr>
            <td>{{ ++$i }} / {{ $template->id }} {{ $template->id_master_lists }}</td>
            <td>{{ $template->order_num }}</td>
            <td>{{ $template->item_short_desc }}</td>
            <td>{{ $template->item_long_desc }}</td>
            <td>
				
				@if ( $template->active <> 1)
				Inactive
				@else
				Active
				@endif
			</td>
			<td><a class="btn btn-primary" href="{{ route('template.edit',$template->id) }}">E</a></td>
			<td>
				<form action="{{ route('template.destroy', $template->id) }}" method="POST">
					@csrf
					@method('DELETE')

					<button type="submit" class="btn btn-danger">D</button>
				</td>
        </tr>
        @endforeach
    </table>
  
	{!! $templatelist->links() !!}
      
@endsection
