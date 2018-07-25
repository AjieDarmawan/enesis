<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MtlTypeMarket;
use Illuminate\Support\Facades\Auth;
use Validator; 
use Session;
use DB;

class TypeMarketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $TypMarket = MtlTypeMarket::all();
        return view('master.type_market.index',['TypMarket' => $TypMarket]);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('master.type_market.create');
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
            'type_market_code' => 'required|unique:mtl_type_market',
            'description' => 'required|unique:mtl_type_market',
            'active' => 'required'
            );

        $validator = $this->validate($request, $rules);

        $TypMarket = new MtlTypeMarket; 
        $TypMarket->type_market_code = $request->input('type_market_code') ;
        $TypMarket->description = $request->input('description') ;
        $TypMarket->active = $request->input('active') ;
        $TypMarket->created_by = Auth::user()->id;
        $TypMarket->updated_by = Auth::user()->id;

        $TypMarket->save();

        $Success = 'Data Type Market berhasil di input!';
        Session::flash('success', $Success); 
        
        $TypMarket = MtlTypeMarket::all(); 
        return view('master.type_market.index',['TypMarket' => $TypMarket]);       
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
        $edit = MtlTypeMarket::find($id);
        return view('master.type_market.edit',['EditType' => $edit]);
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
        $TypMarket = MtlTypeMarket::findOrFail($id);
        $input = [
            'type_market_code' => $request['type_market_code'],
            'description' => $request['description'],
            'active' => $request['active']
        ];
        $this->validate($request, [
            'type_market_code' => 'required',
            'description' => 'required',
            'active' => 'required'
        ]);
        MtlTypeMarket::where('id', $id)
            ->update($input);
        
        $Success = 'Data Type Market berhasil di Edit!';
        Session::flash('success', $Success); 
            
        $TypMarket = MtlTypeMarket::all();
        return view('master.type_market.index',['TypMarket' => $TypMarket]);         
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
