<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mtldivision;
use Illuminate\Support\Facades\Auth;
use Validator; 
use Session;
use DB;

class mtldivisioncontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Div = mtldivision::all();
        return view('master.division.index',['Div' => $Div]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('master.activity.create');
       
         return view('master.division.create');

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
         $rules = array(
            'division_code' => 'required|unique:mtl_division',
            'division_name' => 'required|:mtl_division',         
            'active' => 'required|:mtl_division'
            );

        $validator = $this->validate($request, $rules);

        $Div = new mtldivision; 
        $Div->division_code = $request->input('division_code') ; 
        $Div->division_name = $request->input('division_name') ;      
         if ($request->input('active') == 'on') 
            { 
                $Div->active = 'N';
            }
            else
            { 
                $Div->active = 'Y';
            }    
        $Div->created_by = Auth::user()->id; 
        $Div->updated_by = Auth::user()->id;
        $Div->save();

        $Success = 'Data berhasil di input!';
        Session::flash('success', $Success); 
        
        $Div = mtldivision::all();
        return view('master.division.index',['Div' => $Div]);
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
        $edit = mtldivision::find($id);
        return view('master.division.edit',['EditDiv' => $edit]);
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
         $Div = mtldivision::findOrFail($id);
        $input = [
            'division_code' => $request['division_code'],
            'division_name' => $request['division_name']

        ];
        $this->validate($request, [
            'division_code' => 'required',          
            'division_name' => 'required'
        ]);
        mtldivision::where('id', $id)
            ->update($input);
        
        $Success = 'Division berhasil di Edit!';
        Session::flash('success', $Success); 
            
        $Div = mtldivision::all();
        return view('master.division.index', ['Div' => $Div]);
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
