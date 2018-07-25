<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MtlHirarkiPosLimit;
use App\poslimitview;
use Illuminate\Support\Facades\Auth;
use Validator; 
use Session;
use DB;


class MtlHirarkiPosLimitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $GrpAct = poslimitview::all();
        return view('master.hirarki_pos.index',['GrpAct' => $GrpAct]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $lposition = DB::table('mtl_positions')->get();
         $ldivision = DB::table('mtl_division')->get();
         $lgrouplimit = DB::table('mtl_group_hirarki_limit')->get();
         return view('master.hirarki_pos.create', compact('lposition','ldivision','lgrouplimit'));
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
            'position_id' => 'required|unique:mtl_hirarki_pos_limit',
            'division_id' => 'required|:mtl_hirarki_pos_limit',
            'group_limit_id' => 'required|:mtl_hirarki_pos_limit',
            'description' => 'required|:mtl_hirarki_pos_limit'
            );

        $validator = $this->validate($request, $rules);

        $GrpAct = new MtlHirarkiPosLimit; 
        $GrpAct->position_id = $request->input('position_id') ;
        $GrpAct->division_id = $request->input('division_id') ;
        $GrpAct->group_limit_id = $request->input('group_limit_id') ;
        $GrpAct->description = $request->input('description') ; 
        $GrpAct->created_by = Auth::user()->id; 
        $GrpAct->updated_by = Auth::user()->id;
        $GrpAct->save();

        $Success = 'Data Hirarki Pos Limit berhasil di input!';
        Session::flash('success', $Success); 
        
        $GrpAct = poslimitview::all();
        return view('master.hirarki_pos.index',['GrpAct' => $GrpAct]);
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
         $lposition = DB::table('mtl_positions')->get();
         $ldivision = DB::table('mtl_division')->get();
         $lgrouplimit = DB::table('mtl_group_hirarki_limit')->get();
         //return view('master.hirarki_pos.edit', compact('lposition','ldivision','lgrouplimit'));
         return view('master.hirarki_pos.edit',['EditKat' => $edit],compact('lposition','ldivision','lgrouplimit'));
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
         $GrpArea = MtlHirarkiPosLimit::findOrFail($id);
        $input = [
            'position_id' => $request['position_id'],
             'division_id' => $request['division_id'],
             'group_limit_id' => $request['group_limit_id'],
             'description' => $request['description']
        ];
        $this->validate($request, [
            'position_id' => 'required',
            'division_id' => 'required',
            'group_limit_id' => 'required',
            'description' => 'required'
        ]);
        MtlHirarkiPosLimit::where('id', $id)
            ->update($input);
        
        $Success = 'Hirarki Pos Limit berhasil di Edit!';
        Session::flash('success', $Success); 
            
        $KatAct = MtlHirarkiPosLimit::all();
        return view('master.hirarki_pos.index', ['GrpArea' => $KatAct]); 
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
