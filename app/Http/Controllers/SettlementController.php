<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TrxSettlement;
use App\TrxSettlement_v;
use Illuminate\Support\Facades\Auth;
use Validator;
use Session;
use DB;
use App\Http\Requests;

class SettlementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function cari(Request $request){
       $area          = $request->get('area');  
        echo  $area;  
        die;
    }

    public function index(Request $request)
    {
        

         $account_name  = $request->account_name;
         $executor_name = $request->executor_name;
         $area          = $request->area;  
      

         if($area!=null || $executor_name!=null || $account_name!=null ){
                   
                   $Settle = DB::table('eprop_detail_budget_v')
                  ->orWhere('account_name', '=',$account_name)
                  ->orWhere('executor_name','=',$executor_name)
                  ->orWhere('area','=',$area)
                  ->get();

         }else{
           $Settle = DB::table('eprop_detail_budget_v')->get();
         }


       $distributor = DB::table('eprop_detail_budget_v')
       ->select('account_name')
       ->groupBy('account_name')
       ->get();

        $executor_name = DB::table('eprop_detail_budget_v')
       ->select('executor_name')
       ->groupBy('executor_name')
       ->get();

        $area = DB::table('eprop_detail_budget_v')
       ->select('area')
       ->groupBy('area')
       ->get();

        $Settle1 = TrxSettlement::all();
        // return view('master.settlement.index12345', ['Settle' => $Settle], ['Settle1' => $Settle1],['distributor' => $distributor]);
        return view('master.settlement.index12345', compact('Settle','Settle1','distributor','executor_name','area'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // $lpayment = DB::table('status')->get();
       // return view('master.settlement.create', compact('lpayment'));

        //$ltypeproduct = DB::table('type_produk')->get();
        //$Settle = TrxSettlement_v::find($id);
        $ltypeproduct = DB::table('status')->get();
        return view('master.settlement.create', compact('ltypeproduct')
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

        $rules = array(
            'budget_amount'      =>'required|unique:trx_prop_settlement',
            'actual_amount'      =>'required|unique:trx_prop_settlement',
            'eprop_id'      =>'required|unique:trx_prop_settlement',
            'budget_detail_id'      =>'required|unique:trx_prop_settlement'
        );

        $validator = $this->validate($request, $rules);

        $Settle = new TrxSettlement;
        $Settle->budget_amount   = $request->input('budget_amount') ;
        $Settle->actual_amount   = $request->input('actual_amount') ;
        $Settle->eprop_id   = $request->input('eprop_id') ;
        $Settle->budget_detail_id   = $request->input('budget_detail_id') ;
        $Settle->status         = $request->input('status') ;
        $Settle->created_by     = Auth::user()->id;
        $Settle->updated_by     = Auth::user()->id;
        $Settle->save();

        $Success = 'Data Settlement berhasil di input!';
        Session::flash('success', $Success);

        $Settle = TrxSettlement::all();
        return view('master.settlement.index',['Settle' => $Settle]);



    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          //$Settle = TrxSettlement_v::all();
        //return view('master.settlement.index',['Settle' => $Settle]);
       // $Settle = DB::table('eprop_detail_budget_v')->get();
       // return view('master.settlement.index', ['Settle' => $Settle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

         $fnd_values = DB::table('fnd_values')->get();
              foreach($fnd_values as $f){
                  $fnd =  DB::table('fnd_values')->where('group_value',"Payment Type")->get();

              }


        $Settle = DB::table('eprop_detail_budget_v')->where('budget_detail_id',$id)->first();
        $history = DB::table('trx_prop_settlement')->where('budget_detail_id',$id)->get();

        $no = DB::table('trx_prop_settlement')->get();


        return view('master.settlement.edit', ['Settle' => $Settle], compact('fnd','history','no'));
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
        //  $rules = array(
        //     'budget_amount'      =>'required',
        //     'actual_amount'      =>'required',
        //     'list_doc'      =>'required',
        //     //'eprop_id'      =>'required',
        //     'budget_detail_id'      =>'required|:unique'
        // );
        //
        // $validator = $this->validate($request, $rules);
        //
        //$data = new TrxSettlement;

        list($d,$m,$y)=explode('/',$request->Receving);
        list($d1,$m1,$y1)=explode('/',$request->Claim);

       $data                              = new TrxSettlement();
       $data->claim_letter_date	          = $y1.'-'.$m1.'-'.$d1;
       $data->receiving_date	          = $y.'-'.$m.'-'.$d;
       $data->claim_letter_no	          = $request->claim_letter;
       $data->claim_amount	              = $request->claim_amount;
       $data->payment_type	              = $request->Payment;
       $data->list_of_document	          = $request->description;
       $data->budget_detail_id	          = $request->budget_detail_id;
       $data->settlement_num	          = $request->memo;


       $data->created_by                  = Auth::user()->id;
       $data->updated_by                  =  Auth::user()->id;
       $data->save();
       return redirect()->route('settlement.edit',$id)->with('message','Data Berhasil Disimpan');;
         //return view('master.settlement.edit', ['Settle' => $Settle], compact('fnd','history'));

        // $Settle->budget_amount   = $request->input('budget_amount');
        // $Settle->actual_amount   = $request->input('actual_amount');$Settle->list_doc   = $request->input('list_doc');
        // $bud = number_format(($request->input('budget_amount')),2);
        // $act = number_format(($request->input('actual_amount')),2);
        // //dd($bud);
        // //dd($act);
        // if ($act > $bud)
        // {
        //     $otherErrors = 'Actual amount tidak boleh lebih besar dari budget amount ';
        //     Session::flash('otherErrors', $otherErrors);
        // }
        // else
        //    {
            // $Settle->eprop_id   = $request->input('header_id') ;
            // $Settle->budget_detail_id   = $request->input('budget_detail_id') ;
            // $Settle->status         = $request->input('status') ;
            // $Settle->created_by     = Auth::user()->id;
            // $Settle->updated_by     = Auth::user()->id;
            // $Settle->save();
        //
        //     $Success = 'Data Settlement berhasil di input!';
        //     Session::flash('success', $Success);
        // }
        //
        // $Settle = DB::table('eprop_detail_budget_v')->get();
        // $Settle1 = DB::table('trx_settlement_view')->get();
        // return view('master.settlement.index', ['Settle' => $Settle], ['Settle1' => $Settle1]);

        //echo "string";

        //trx_prop_settlement





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

    public function insert_histroy_sett(){
      echo "string";
    }



}
