<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ListTemplateItems;

class ListTemplateItemsController extends Controller
{
    public function index(Request $request)
		{
			$list_id = $request->input('list_id');										// get ?list_id=x from url
			//$templatelist = ListTemplateItems($id)::latest()->paginate(5);
			$templatelist = ListTemplateItems::where('id_master_lists', $list_id)->orderBy('order_num', 'ASC')->paginate(10);
			return view('template.index',compact('templatelist'));
			
			//return ListTemplateItems::get();
		}

    public function create(Request $request)
    {		
			$list_id = $request->input('list_id');
			//$templatelist = ListTemplateItems::latest()->paginate(5);
			//return view('template.index',compact('templatelist'));
			
			return view('template.create', ['list_id' => $list_id]);
    }
    
    public function edit(ListTemplateItems $template)
    {
        return view('template.edit',compact('template'));
    }
    
    public function update(Request $request, ListTemplateItems $template)
    {
		$request->validate([
			'id_master_lists' => 'required',
			'item_short_desc' => 'required',
			'item_long_desc' => 'required',
			'order_num' => 'required',
			'active' => 'required',
			]);
  
		$list_id = $request->input('id_master_lists');
  
        $template->update($request->all());
   
        return redirect()->route('template.index', ['list_id' => $list_id])
                        ->with('success','List item updated successfully.');
    }   
    
    public function store(Request $request)
    {
		$request->validate([
			'id_master_lists' => 'required',
			'item_short_desc' => 'required',
			'item_long_desc' => 'required',
			'order_num' => 'required',
			'active' => 'required',
			]);
		
		$list_id = $request->input('id_master_lists');
		
        ListTemplateItems::create($request->all());
				
        return redirect()->route('template.index', ['list_id' => $list_id])
                        ->with('success','List Item created successfully.');
		}
		
	    public function destroy(ListTemplateItems $template, Request $request)
    {	


		
        $template->delete();
  
        return redirect()->route('template.index', ['list_id' => $template->id_master_lists]);
    }
}
