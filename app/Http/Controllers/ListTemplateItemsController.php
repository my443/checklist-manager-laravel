<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ListTemplateItems;

class ListTemplateItemsController extends Controller
{
    public function index(Request $request)
		{
			$id = $request->input('id');										// get ?id=x from url
			//$templatelist = ListTemplateItems($id)::latest()->paginate(5);
			$templatelist = ListTemplateItems::where('id_master_lists', $id)->paginate(5);
			return view('template.index',compact('templatelist'));
			
			//return ListTemplateItems::get();
		}

    public function create()
    {
			$templatelist = ListTemplateItems::latest()->paginate(5);
			return view('template.index',compact('templatelist'));
    }
    
    public function edit()
    {
			$templatelist = ListTemplateItems::latest()->paginate(5);
			return view('template.index',compact('templatelist'));
    }
}
