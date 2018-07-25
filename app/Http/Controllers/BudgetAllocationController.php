<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Carbon;
use App\TrxBudgetAllocation;
use App\BudgetStrDtlView;
use Illuminate\Support\Facades\Auth;
use Validator; 
use Session;
use DB;

class BudgetAllocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //
        $BudgetDtlv = BudgetStrDtlView::all();
        return view('budget_alokasi.alokasi_str.index',['BudgetDtlv' => $BudgetDtlv]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
//         $lregion = DB::table('mtl_region')->get();
         $lsubregion = DB::table('mtl_subregion')->get();
         return view('budget_alokasi.alokasi_str.create', compact('lregion'), compact('lsubregion'));        
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

//        dd($request->all());
         $rules = array(
//            'budget_det_id' => 'required|:trx_budget_allocation',
            'allocation_date' => 'required|:trx_budget_allocation',
//            'allocation_type' => 'required|:trx_budget_allocation',
//            'from_brand_id' => 'required|:trx_budget_allocation',
//            'from_cat_act_id' => 'required|:trx_budget_allocation',
//            'begining_budget' => 'required|:trx_budget_allocation',
//            'ending_budget' => 'required|:trx_budget_allocation',
//            'to_brand_id' => 'required|:trx_budget_allocation',
//            'to_cat_act_id' => 'required|:trx_budget_allocation',
//            'to_region_id' => 'required|:trx_budget_allocation',
//            'to_mt_account_id' => 'required|:trx_budget_allocation',
            'allocation' => 'required|:trx_budget_allocation'            
         );

         dd($request->all());
        $validator = $this->validate($request, $rules);

        $BStrDetail = DB::table('budget_str_detail_view')->where('id',$budget_det_id)->get();
        $BStrDetailAl = DB::table('budget_str_detail_view')->where('id',$tobudget_det_id)->get();
        dd($BStrDetail);

        foreach ($BStrDetail as $key => $value) {
            $from_allocation_type = $value->allocation_type;
            $from_brand_id = $value->brand_id;
            $from_cat_act_id = $value->cat_activity_id;
            $from_begining_budget = $value->begining_budget;
            $from_ending_budget = $value->ending_budget;
        }
        foreach ($BStrDetailAl as $key => $value) {
            $to_allocation_type = $value->allocation_type;
            $to_brand_id = $value->brand_id;
            $to_cat_act_id = $value->cat_activity_id;
            $to_begining_budget = $value->begining_budget;
            $to_ending_budget = $value->ending_budget;
        }        

        //save from allocation
        foreach ($BStrDetail as $key => $value) {
            $BudgetLct = new TrxBudgetAllocation; 
            $BudgetLct->budget_det_id = $request->input('budget_det_id'); 
            $BudgetLct->allocation_date = $request->input('allocation_date');
            $BudgetLct->allocation_type = $value->allocation_type ;
            $BudgetLct->from_brand_id = $value->brand_id ;
            $BudgetLct->from_cat_act_id = $value->from_cat_act_id ;
            $BudgetLct->begining_budget = $value->begining_budget ;
            $BudgetLct->ending_budget = ($value->ending_budget - $request->input('allocation'));
            $BudgetLct->submit_allocation = 'Y' ;
            $BudgetLct->to_brand_id = $value->to_brand_id ;
            $BudgetLct->to_cat_act_id = $value->to_cat_act_id ;
            $BudgetLct->to_region_id = $value->to_region_id ;
            $BudgetLct->to_mt_account_id = $value->to_mt_account_id ;
            $BudgetLct->allocation = -($request->input('allocation'));
            $BudgetLct->created_by = Auth::user()->id; 
            $BudgetLct->updated_by = Auth::user()->id;

            $BudgetLct->save();
        }

        foreach ($BStrDetailAl as $key => $value) {
            $BudgetLct = new TrxBudgetAllocation; 
            $BudgetLct->budget_det_id = $request->input('tobudget_det_id'); 
            $BudgetLct->allocation_date = $request->input('allocation_date');
            $BudgetLct->allocation_type = $value->allocation_type ;
            $BudgetLct->from_brand_id = $value->brand_id ;
            $BudgetLct->from_cat_act_id = $value->from_cat_act_id ;
            $BudgetLct->begining_budget = $value->begining_budget ;
            $BudgetLct->ending_budget = ($value->ending_budget + $request->input('allocation'));
            $BudgetLct->submit_allocation = 'Y' ;
            $BudgetLct->to_brand_id = $value->to_brand_id ;
            $BudgetLct->to_cat_act_id = $value->to_cat_act_id ;
            $BudgetLct->to_region_id = $value->to_region_id ;
            $BudgetLct->to_mt_account_id = $value->to_mt_account_id ;
            $BudgetLct->allocation = $request->input('allocation') ;
            $BudgetLct->created_by = Auth::user()->id; 
            $BudgetLct->updated_by = Auth::user()->id;

            $BudgetLct->save();

        }        

        $Success = 'Data Alokasi Budget berhasil di input!';
        Session::flash('success', $Success); 
        
        $BudgetDtlv = BudgetStrDtlView::all();
        return view('budget_alokasi.alokasi_str.index',['BudgetDtlv' => $BudgetDtlv]);               
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
        $lcompany = DB::table('mtl_company')->get();
        $BudgetStrAl = BudgetStrDtlView::find($id);
 
        $BStrDetailAl = DB::table('budget_str_detail_view')->where('id',$id)->get();    
        return view('budget_alokasi.alokasi_str.show',['BudgetStrAl' => $BudgetStrAl], compact('lcompany'));         
    }

    public function showbudget($to_bgt_id,$from_bgt_id)
    {
        //
        dd($to_bgt_id,$from_bgt_id);
        $lcompany = DB::table('mtl_company')->get();
        $BudgetStrAl = BudgetStrDtlView::find($to_bgt_id);
 
        $BStrDetailAl = DB::table('budget_str_detail_view')->where('id',$id)->get();    
        return view('budget_alokasi.alokasi_str.show',['BudgetStrAl' => $BudgetStrAl], compact('lcompany'));         
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
//        $Bstrdtl = DB::table('budget_str_detail_view')->where('id',$id)->get();
        $lcompany = DB::table('mtl_company')->get();
        $lbrand = DB::table('mtl_brand_produk')->get();
        $lkatacvty = DB::table('mtl_kategory_activity')->get();
        $lregion = DB::table('mtl_region')->get();
        $laccount = DB::table('mtl_mt_channel')->get();
        $Bstrdtl = DB::table('budget_str_detail_view')->get();
        $BudgetStr = BudgetStrDtlView::find($id);
        $from_alocate_id = $id;
 
        $BStrDetail = DB::table('budget_str_detail_view')->where('id',$id)->get();    
        return view('budget_alokasi.alokasi_str.edit',['BudgetStr' => $BudgetStr], compact('lcompany','from_alocate_id','BStrDetail','Bstrdtl','LokasiBg','lbrand','lkatacvty','lregion','laccount'));        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function alokasi($id)
    {
        //
//        $BudgetStrAl = BudgetStrDtlView::find($id);
 
//        $BStrDetailAl = DB::table('budget_str_detail_view')->where('id',$id)->get();    
//        return view('budget.alokasi_str.alokasi',['BudgetStrAl' => $BudgetStrAl]);        
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
