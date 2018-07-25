<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MtlGtStore;
use Illuminate\Support\Facades\Auth;
use Validator; 
use Session;
use DB;

class GtStoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $GtStore = MtlGtStore::all();
        return view('master.gt_store.index',['GtStore' => $GtStore]);          
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $ltypmarket = DB::table('mtl_type_market')->get();
        return view('master.gt_store.create', compact('ltypmarket') 
        );           
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
            'cust_ship_id' => 'required',            
            'customer_number' => 'required|unique:mtl_gt_store',            
            'store_name' => 'required',
            'alamat' => 'required',
            'alamat2' => 'required',
            'alamat3' => 'required',
            'alamat4' => 'required',
            'kota' => 'required',
            'propinsi' => 'required',                        
            'active' => 'required',
            'type_market_code' => 'required'
            );

        $validator = $this->validate($request, $rules);

        $GtStore = new MtlGtStore;
        $GtStore->cust_ship_id = $request->input('cust_ship_id') ;        
        $GtStore->customer_number = $request->input('customer_number') ; 
        $GtStore->store_name = $request->input('store_name') ; 
        $GtStore->alamat = $request->input('alamat') ;
        $GtStore->alamat2 = $request->input('alamat2') ; 
        $GtStore->alamat3 = $request->input('alamat3') ; 
        $GtStore->alamat4 = $request->input('alamat4') ;
        $GtStore->kota = $request->input('kota') ; 
        $GtStore->propinsi = $request->input('propinsi') ;                                  
        $GtStore->active = $request->input('active') ;
        $GtStore->type_market_code = $request->input('type_market_code') ;
        $GtStore->created_by = Auth::user()->id;
        $GtStore->updated_by = Auth::user()->id;

        $GtStore->save();

        $Success = 'Data Gt Store berhasil di input!';
        Session::flash('success', $Success); 
        
        $GtStore = MtlGtStore::all();
        return view('master.gt_store.index',['GtStore' => $GtStore]);          
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
        $edit = MtlGtStore::find($id);
        return view('master.gt_store.edit',['EditStore' => $edit]);       
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
        $GtStore = MtlGtStore::findOrFail($id);
        $input = [
            'cust_ship_id' => $request['cust_ship_id'],
            'customer_number' => $request['customer_number'],
            'store_name' => $request['store_name'],
            'alamat' => $request['alamat'],
            'alamat2' => $request['alamat2'],
            'alamat3' => $request['alamat3'],
            'alamat4' => $request['alamat4'],
            'kota' => $request['kota'],
            'propinsi' => $request['propinsi'],                                                         
            'active' => $request['active'],         
            'type_market_code' => $request['type_market_code']
        ];
        $this->validate($request, [
            'cust_ship_id' => 'required',
            'customer_number' => 'required',            
            'store_name' => 'required',
            'alamat' => 'required',
            'alamat2' => 'required',
            'alamat3' => 'required',
            'alamat4' => 'required', 
            'kota' => 'required',
            'propinsi' => 'required',
            'active' => 'required',                       
            'type_market_code' => 'required'
        ]);
        MtlGtStore::where('id', $id)
            ->update($input);
        
        $Success = 'Data Gt Store berhasil di Edit!';
        Session::flash('success', $Success); 
             
        $GtStore = MtlGtStore::all();
        return view('master.gt_store.index',['GtStore' => $GtStore]);         
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
