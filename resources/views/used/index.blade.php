@extends('used.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Complete or In-Use Checklists</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-info" href="{{ route('masterlist.index') }}"> Master List</a>
            </div>
            <div class="pull-right"> 
                <a class="btn btn-success" href="{{ route('used.create', ['list_id' => $list_id]) }}">Initiate New Checklist</a>
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
            <th class="w-50">Name</th>
            <th class="w-10">Start Date</th>
            <th class="w-10">Completed Date</th>
            <th class="w-10">Action</th>
        </tr>
        @foreach ($allitems as $used)
        <tr>
            <td>{{ ++$i }} / {{ $used->id }} {{ $used->id_master_lists }}</td>
            <td>{{ $used->masterlist['listname'] }}</td>
            <td>{{ $used->start_date }}</td>
            <td>{{ $used->completed_date }}</td>
            <td><a class="btn btn-success" href="{{ route('initiated.index', ['list_id' => $list_id, 'initiated_id' => $used->id]) }}">Details</a></td>
        </tr>
        @endforeach
    </table>
  

      
@endsection
