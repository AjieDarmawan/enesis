<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\fndvalues;
use Illuminate\support\facades\Auth;
use Session ;
use DB ;

class fndvaluescontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $GrpVal = fndvalues::all(); 
        return view('master.fndvalues.index',['GrpVal'=> $GrpVal]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lgrpvalues = DB::table('group_values_view')->get(); 
        //$lregion = DB::table('mtl_region')->get(); 
        //$lsubregion = DB::table('mtl_subregion')->get(); 
        //$ljob = DB::table('mtl_jobs')->get(); 

        return view('master/fndvalues/create', compact('lgrpvalues'));    
        //return view('master.fndvalues.create');    
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
