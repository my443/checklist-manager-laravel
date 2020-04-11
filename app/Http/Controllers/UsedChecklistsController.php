<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\used_checklists;

class UsedChecklistsController extends Controller
{
    public function index(Request $request)
		{

			$allitems = used_checklists::orderBy('start_date', 'ASC')->get();
			return view('used.index', compact('allitems'));

		}
}
