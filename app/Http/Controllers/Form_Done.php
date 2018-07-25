<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Session;
use DB;
use App\txt_result_implementation;

class Form_Done extends Controller
{
    function index(){
      $budget = DB::table('eprop_detail_budget_v')->get();
      return view('master/form_done/v_form_done', compact('budget'));
    }

    function edit($id){
      $fnd_values = DB::table('fnd_values')->get();
           foreach($fnd_values as $f){
               $fnd =  DB::table('fnd_values')->where('group_value',"Payment Type")->get();

           }


     $Settle = DB::table('eprop_detail_budget_v')->where('budget_detail_id',$id)->first();

     $history = DB::table('trx_prop_settlement')->where('budget_detail_id',$id)->get();

     //$implementation = DB::table('trx_result_implementation')->where('budget_detail_id',$id)->get();
      

      $implementation = DB::table('eprop_detail_budget_v AS p')
     ->leftJoin('trx_result_implementation as c', 'p.budget_detail_id', '=', 'c.budget_detail_id_prop')
       ->where('c.status','Done')
     ->select('p.*','c.*')
     ->get();
       
     


     return view('master.form_done.edit', ['Settle' => $Settle], compact('fnd','history','implementation'));

    }

    function update(Request $request, $id){

        $data = array(
          'budget_detail_id_prop' => $request->budget_detail_id,
          'actual_achievement' => $request->actual_ach,
          'actual_sales' => $request->actual_sales,
          'actual_achieve_perc' => $request->actual_target,
           'actual_cost_ratio' => $request->actual_cost,
          'status' => "Done",
          );
        DB::table('trx_result_implementation')->insert($data);



        return redirect()->route('done_form.edit',$id)->with('message','Data Berhasil Disimpan');

    


    }
}
