<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MtlGroupHirarkiLimit;
use Illuminate\Support\Facades\Auth;
use Validator; 
use Session;
use DB;

class MtlGroupHirarkiLimitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $IHirarki = MtlGroupHirarkiLimit::all();
        return view('master.group_hirarki_limit.index',['IHirarki' => $IHirarki]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('master.group_hirarki_limit.create');
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
            'description' => 'required|unique:mtl_group_hirarki_limit',
            'amount_from' => 'required|:mtl_group_hirarki_limit',
            'amount_to' => 'required|:mtl_group_hirarki_limit'
             );

        $validator = $this->validate($request, $rules);

        $IHirarki = new MtlGroupHirarkiLimit; 
        $IHirarki->description = $request->input('description') ;
        $IHirarki->amount_from = $request->input('amount_from') ;
        $IHirarki->amount_to = $request->input('amount_to') ;
        $IHirarki->created_by = Auth::user()->id; 
        $IHirarki->updated_by = Auth::user()->id;
        $IHirarki->save();

        $Success = 'Data Group Hirarki Limit berhasil di input!';
        Session::flash('success', $Success); 
        
        $IHirarki = MtlGroupHirarkiLimit::all();
        return view('master.group_hirarki_limit.index',['IHirarki' => $IHirarki]);
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
        $edit = MtlGroupHirarkiLimit::find($id);
        return view('master.group_hirarki_limit.edit',['EditGrp' => $edit]);
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
        $IHirarki = MtlGroupHirarkiLimit::findOrFail($id);
        $input = [
            'description' => $request['description'],
            'amount_from' => $request['amount_from'],
            'amount_to' => $request['amount_to']
        ];
        $this->validate($request, [
            'description' => 'required',
            'amount_from' => 'required',
            'amount_to' => 'required'
        ]);
        MtlGroupHirarkiLimit::where('id', $id)
            ->update($input);
        
        $Success = 'Group Hirarki Limit berhasil di Edit!';
        Session::flash('success', $Success); 
            
        $IHirarki = MtlGroupHirarkiLimit::all();
        return view('master.group_hirarki_limit.index', ['IHirarki' => $IHirarki]); 
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
