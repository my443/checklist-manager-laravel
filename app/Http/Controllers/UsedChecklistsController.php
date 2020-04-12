<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\used_checklists;

use DB;

class UsedChecklistsController extends Controller
{
    public function index(Request $request)
		{
			$list_id = $request->input('list_id');	
			$allitems = used_checklists::with('masterlist')->latest()->where('id_masterlists', $list_id)->orderBy('start_date', 'ASC')->paginate(10);
			return view('used.index', compact('allitems'), ['list_id' => $list_id]);

		}
		
	public function create(Request $request)
    {
	
		$list_id = $request->input('list_id');
		
		$id_masterlist = $list_id;
		$start_date 	= '2020-04-11';
		
		$data = array('id_masterlists'=>$id_masterlist, 'start_date'=>$start_date);
		
		DB::table('used_checklists')->insert($data);
		
		return redirect()->route('used.index' , ['list_id' => $list_id])
			->with('success','New List initiated successfully.');
		
		}
	

}
