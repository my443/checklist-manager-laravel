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
        
		foreach ($committedItems as $item){
			echo $item;
			}
			echo '<br><br>';
        /** Loop through each item in Template item, 
         * 	If it is included already, read the value from the database.
         * 	If it isn't completed, then the value is not complete.  
         * **/
        foreach ($templatelist as $item) {
			
			$itemID = $item->id;
			$item->id_used_checklist = $used_id;						// Add another column to the $item array
			echo $item.'<br>';

			if (empty($committedItems)) {							// Find out if the array is empty
				$item->complete 	= false;						// Item is not complete
				$item->init_id		= 0;							// Init id = 0				
				}
			else{
				foreach ($committedItems as $com_items){
						if($com_items->id_list_templates == $itemID){
							$item->complete = $com_items->complete;
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

		echo $initiated_row_id;
		
		$data = array('id_masterlists'=>$list_id, 'id_list_templates'=>$template_row_id, 'id_used_checklist'=>$initiated_id, 'complete'=>$update_value);
		
		if ($initiated_row_id == 0) {
			DB::table('initiated_checklists')->insert($data);		
			}
		
		
		return redirect()->route('initiated.index' , ['list_id' => $list_id, 'initiated_id'=>$initiated_id])
					->with('success','Change successful.');	
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		//		
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
