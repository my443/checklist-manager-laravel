<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\initiated_checklists;
use App\ListTemplateItems;

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
        $commitedItems = initiated_checklists::where('id_masterlists', $list_id)->where('id_used_checklist', $used_id)
							->orderBy('order_num', 'ASC')->paginate(10);
        
        $allitems = $templatelist;
        foreach ($templatelist as $item) {
			echo $item->id;
}
        
        return view('initiated.index', compact('allitems'), ['list_id' => $list_id, 'initiated_id' => $used_id]);
        
        //$allitems = initiated_checklists::with('masterlist')->latest()->where('id_masterlists', $list_id)
		//			->where('id_masterlists', $list_id)->orderBy('start_date', 'ASC')->paginate(10);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
