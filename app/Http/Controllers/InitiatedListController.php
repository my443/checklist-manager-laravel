<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\initiated_checklists;
use App\ListTemplateItems;
use DB;

class InitiatedListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list_id = $request->input('list_id');	
        $used_id = $request->input('initiated_id');	
        
        $templatelist = ListTemplateItems::where('id_master_lists', $list_id)->orderBy('order_num', 'ASC')->paginate(10);
        $committedItems = initiated_checklists::where('id_masterlists', $list_id)->where('id_used_checklist', $used_id)->paginate(10);

        /** Loop through each item in Template item, 
         * 	If it is included already, read the value from the database.
         * 	If it isn't completed, then the value is not complete.  
         * **/
        foreach ($templatelist as $item) {
			$itemID = $item->id;
			$item->initiated_id = $used_id;
			
			if (!empty($committedItems)) {						// Find out if the array is empty
				$item->complete 	= false;						// Item is not complete
				$item->init_id		= 0;						// Init id = 0				
				}
			else {
				foreach ($committedItems as $ci) {
					$id_used = $ci->id_used_checklist;
					if ($id_used == $itemID) {
						$item->complete = $ci->completed;				// Whatever value is in committedItems completed, put it in the array.
						$item->init_id = $ci->id;							// Add the $init_id to the array.
						}
					else{
						$item->complete 	= false;						// Item is not complete
						$item->init_id		= 0;						// Init id = 0
						}
					}
				}
			
			}
 
         $allitems = $templatelist;
        
        return view('initiated.index', compact('allitems'), ['list_id' => $list_id, 'initiated_id' => $used_id]);
        
        //$allitems = initiated_checklists::with('masterlist')->latest()->where('id_masterlists', $list_id)
		//			->where('id_masterlists', $list_id)->orderBy('start_date', 'ASC')->paginate(10);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $list_id 			= $request->input('list_id');						// The listname (from Masterlist)
		$initiated_id 		= $request->input('initiated_id');					// The initiated list (from used_checklists)
		$template_row_id 	= $request->input('template_row_id');				// The actual row (checked or not) (from initiated_checklists)
		$initiated_row_id 	= $request->input('initiated_row_id');				// The row_id (from template)
		$update_value 		= 1;												// Default update value
        //$data = array('id_masterlists'=>12, 'id_list_templates'=>34, 'id_used_checklist'=>17, 'complete' => 1);
		echo $initiated_row_id;
		
		$data = array('id_masterlists'=>$list_id, 'id_list_templates'=>$template_row_id, 'id_used_checklist'=>$initiated_id, 'complete'=>$update_value);
		
		if ($initiated_row_id == 0) {
			DB::table('initiated_checklists')->insert($data);		
			}
		
		
		//return redirect()->route('initiated.index' , ['list_id' => $list_id, 'initiated_id'=>$initiated_id]);
			//		->with('success','Change successful.');	
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$list_id 			= $request->input('list_id');						// The listname (from Masterlist)
		$initiated_id 		= $request->input('initiated_id');					// The initiated list (from used_checklists)
		$template_row_id 	= $request->input('template_row_id');				// The actual row (checked or not) (from initiated_checklists)
		$initiated_row_id 	= $request->input('initiated_row_id');				// The row_id (from template)

		//$saveditem = initiated_checklists::where('id_masterlists', $initiated_row_id);		// Get the row that is already with data.
		
		
		//$data = array('id_masterlists'=>$list_id, 'id_list_tempate'=>$initiated_row_id, 'id_used_checklists'=>$initiated_id, 1);
		$data = array('id_masterlists'=>12, 'id_list_tempates'=>34, 'id_used_checklist'=>17, 'complete' => 1);
		
		DB::table('initiated_checklists')->insert($data);		
		
		//// If the row # is 0 -- Create a new row.
		//if ($initiated_row_id == 0){
			//echo 'got here';
			//$data = array('id_masterlists'=>$list_id, 'id_list_tempate'=>$initiated_row_id, 'id_used_checklists'=>$initiated_id, 1);
		
			//DB::table('initiated_checklists')->insert($data);
			//}
		//else {
			//// If the row # is something else, then add it as complete.	
			//if ($saveditem->complete == 0) {
				//$update_value = 1;
			//}
			//else {
				//$update_value = 0;
				//}
				
				//$data = array('id_masterlists'=>$list_id, 'id_list_tempate'=>$initiated_row_id, 'id_used_checklists'=>$initiated_id, $update_value);
			
				//DB::table('initiated_checklists')->where('id', checklist_row_id)->update($data);
			//}
		
			//return redirect()->route('initiated.index' , ['list_id' => $list_id, 'initiated_id'=>$initiated_id])
			//		->with('success','Change successful.');	
		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
