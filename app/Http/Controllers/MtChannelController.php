<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MtlMtChannel;
use Illuminate\Support\Facades\Auth;
use Validator; 
use Session;
use DB;

class MtChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $MtChann = MtlMtChannel::all();
        return view('master.mt_channel.index',['MtChann' => $MtChann]);         
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
        return view('master.mt_channel.create', compact('ltypmarket')
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
            'channel_name' => 'required|unique:mtl_mt_channel',            
            'type_market_code' => 'required|unique:mtl_mt_channel',
            'active' => 'required'
            );

        $validator = $this->validate($request, $rules);

        $MtChann = new MtlMtChannel;
        $MtChann->channel_name = $request->input('channel_name') ;         
        $MtChann->type_market_code = $request->input('type_market_code') ;
        $MtChann->active = $request->input('active') ;
        $MtChann->created_by = Auth::user()->id;
        $MtChann->updated_by = Auth::user()->id;

        $MtChann->save();

        $Success = 'Data Mt Channel berhasil di input!';
        Session::flash('success', $Success); 
        
        $MtChann = MtlMtChannel::all();
        return view('master.mt_channel.index',['MtChann' => $MtChann]);        
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
        $edit = MtlMtChannel::find($id);
        return view('master.mt_channel.edit',['EditChannel' => $edit]);        
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
        $MtChann = MtlMtChannel::findOrFail($id);
        $input = [
            'channel_name' => $request['channel_name'],        
            'type_market_code' => $request['type_market_code'],
            'active' => $request['active']
        ];
        $this->validate($request, [
            'channel_name' => 'required',            
            'type_market_code' => 'required',
            'active' => 'required'
        ]);
        MtlMtChannel::where('id', $id)
            ->update($input);
        
        $Success = 'Data Mt Channel berhasil di Edit!';
        Session::flash('success', $Success); 
            
        $MtChann = MtlMtChannel::all();
        return view('master.mt_channel.index',['MtChann' => $MtChann]);          
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
