<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\MasterList;

class MasterListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masterlist = MasterList::latest()->paginate(5);
        return view('masterlist.index',compact('masterlist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masterlist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'listname' => 'required',
            'active' => 'required',
            'description' => 'required',
        ]);
  
        MasterList::create($request->all());
   
        return redirect()->route('masterlist.index')
                        ->with('success','Master List created successfully.');
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
    public function edit(Masterlist $masterlist)
    {
        return view('masterlist.edit',compact('masterlist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MasterList $masterlist)
    {
        $request->validate([
            'listname' => 'required',
            'active' => 'required',
            'description' => 'required',
        ]);
  
        $masterlist->update($request->all());
   
        return redirect()->route('masterlist.index')
                        ->with('success','Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterList $masterlist)
    {
        $masterlist->delete();
  
        return redirect()->route('masterlist.index');
    }
 
}
