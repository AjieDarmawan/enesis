<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mtldivision;
use Illuminate\support\facades\Auth;
use Session ;
use DB ;



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
        $GrpDiv = mtldivision::all(); 
        return view('master.division.index',['GrpDiv'=> $GrpDiv]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.division.create');
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

       
        $rules = array('division_code' => 'required|unique:mtl_division');

        $validator =$this->validate($request, $rules);
 
        $GrpDiv = new mtldivision;
        $GrpDiv->division_code=$request->input('division_code'); 
        $GrpDiv->division_name=$request->input('division_name'); 
               
        //$GrpDiv->created_by = Auth::user()->id;
        //$GrpDiv->updated_by = Auth::user()->id;
           $GrpDiv->created_by = Auth::user()->id;
           $GrpDiv->updated_by = Auth::user()->id;

        $GrpDiv->save();

        $success ='data berhasil di input';
        session::flash('success', $success);


        $GrpDiv = mtldivision::all();
        return view('master.division.index',['GrpDiv' => $GrpDiv]);
       


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
        $Editdiv = mtldivision::find($id);
        return view('master.division.edit',['Editdiv' => $Editdiv]);     
        
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

        $GrpDiv= mtldivision::findorFail($id);
        $input=[
            //'division_code' => $request['division_code'],           
            'division_name' => $request['division_name']
        ];

         $this->validate($request,['division_name'=>'required']);
         mtldivision::where('id',$id)->update($input);
          $success ='Division berhasil di Edit';
          session::flash('success', $success);

        $GrpDiv = mtldivision::all();
        return view('master.division.index',['GrpDiv' => $GrpDiv]);
       
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
