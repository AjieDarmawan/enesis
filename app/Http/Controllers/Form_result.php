<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\txt_result_implementation;

class Form_result extends Controller
{
    function index(){


          $budget = DB::table('eprop_detail_budget_v')->get();		
    	 return view('master.form_result.v_result',compact('budget'));
    }

    function edit($id){
    	  $fnd_values = DB::table('fnd_values')->get();
           foreach($fnd_values as $f){
               $fnd =  DB::table('fnd_values')->where('group_value',"Payment Type")->get();

           }


     $Settle = DB::table('eprop_detail_budget_v')->where('budget_detail_id',$id)->first();

     $history = DB::table('trx_prop_settlement')->where('budget_detail_id',$id)->get();

     //$implementation = DB::table('trx_result_implementation')->where('budget_detail_id',$id)->get();
      

     //  $implementation = DB::table('eprop_detail_budget_v AS p')
     // ->leftJoin('trx_result_implementation as c', 'p.budget_detail_id', '=', 'c.budget_detail_id_prop')
     //   ->where('c.status','Done')
     // ->select('p.*','c.*')
     // ->get();
       
     


     return view('master.form_result.edit_result', ['Settle' => $Settle], compact('fnd','history'));

    }

    function update(Request $request, $id){


            $photo = $request->file('result_path');
            $fileName = $photo->getClientOriginalName();
            $destination = base_path().'/public/file_uploads/dokumen_form_result';
            $photo->move($destination,$fileName);



        $data = array(
          'budget_detail_id_prop'   => $request->budget_detail_id,
          'actual_achievement'      => $request->actual_ach,
          'actual_sales'            => $request->actual_sales,
          'actual_achieve_perc'     => $request->actual_target,
          'actual_cost_ratio'       => $request->actual_cost,
          'result_implement_descr'  =>$request->result_implement_descr,
          'result_path'             =>$fileName,
          'status'                  => "Result",
          );

        DB::table('trx_result_implementation')->insert($data);

       
            // $data           =  txt_result_implementation::find($id);  
            //    // $request->induk_dokumen;
            // $photo = $request->file('result_path');
            // $fileName = $photo->getClientOriginalName();
            // $destination = base_path().'/public/file_uploads/dokumen_form_result';
            // $photo->move($destination,$fileName);
            // $data->budget_detail_id_prop           = $request->budget_detail_id;
            // $data->result_path                = $fileName;
            // $data->result_implement_descr     = $request->result_implement_descr;
            // $data->actual_cost                = $request->actual_cost;
            // $data->actual_achieve_perc        = $request->actual_target;
            //  $data->actual_achievement        = $request->actual_ach;
            // $data->actual_sales               = $request->actual_sales;
            // $data->save();



        return redirect()->route('result.index',$id)->with('message','Data Berhasil Disimpan');

    


    }
}
