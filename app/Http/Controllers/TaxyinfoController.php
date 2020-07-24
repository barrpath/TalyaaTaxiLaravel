<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Taxyinfo;

class TaxyinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $taxilist = Taxyinfo::all();

        return view('index', compact('taxilist'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'plat_no' => 'required|max:25',
            'model' => 'required|max:4',
            'brand' => 'required',
            'type'  => 'required',
            'area' => 'required',
            'status' => 'required',
        ]);
        $show = Taxyinfo::create($validatedData);
   
        return redirect('/taxies')->with('success', 'Taxy information is successfully saved');
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
         $taxilist = Taxyinfo::findOrFail($id);
         return view('edit', compact('taxilist'));
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
         $validatedData = $request->validate([
            'plat_no' => 'required|max:25',
            'model' => 'required|max:4',
            'brand' => 'required',
            'type'  => 'required',
            'area' => 'required',
            'status' => 'required',
        ]);
        Taxyinfo::whereId($id)->update($validatedData);

        return redirect('/taxies')->with('success', 'Taxy information is successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $taxilist = Taxyinfo::findOrFail($id);
        $taxilist->delete();
        return redirect('/taxies')->with('success', 'Taxy information is successfully deleted');
    }
}
