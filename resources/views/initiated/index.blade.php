@extends('initiated.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Template Manager - List Template Items</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-info" href="{{ route('masterlist.index') }}"> Master List</a>
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
            <th class="w-10">Status</th>
            <th class="w-2">-</th>
        </tr>
        @foreach ($allitems as $item)
        <tr>
            <td>{{ ++$i }} / {{ $item->id }} // {{ $item->init_id }} </td>
            <td>{{ $item->order_num }}</td>
            <td>{{ $item->item_short_desc }}</td>
            <td>{{ $item->item_long_desc }}</td>
            <td>
				
				@if ( $item->complete <> 1)
				Not Complete
				@else
				Complete
				@endif
			</td>
			<td><a class="btn btn-primary" 
					href="{{ route('initiated.create', ['list_id' => $list_id, 'initiated_id' => $item->initiated_id, 'template_row_id'=> $item->id, 'initiated_row_id' => $item->init_id]) }}">C</a></td>
        </tr>
        @endforeach
    </table>
  

      
@endsection
