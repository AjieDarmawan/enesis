<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\TrxSettlement;
//use App\TrxSettlement_v;
use App\Bataleprop1;
use App\Bataleprop;
use App\Bataleprop_v;
use Illuminate\Support\Facades\Auth;
use Validator; 
//use App\Models\Device;
use Session;
use DB;

class batal_epropController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $Batal = DB::table('eprop_detail_budget_v')->get()->where('execute_status','<>','CANCELLED');  
        //$Batal1 = Bataleprop1::where('status','!=','CANCELLED')->get();
        //return view('master.batal_eprop.index', ['Batal' => $Batal], ['Batal1' => $Batal1]);
        
        //$Settle = TrxSettlement_v::all();
        //return view('master.settlement.index',['Settle' => $Settle]);
        //$Batal = DB::table('eprop_detail_budget_v')->get()->where('execute_status','<>','CANCELLED');   
        //$Batal1 = Bataleprop1::all();
        //return view('master.batal_eprop.index', ['Batal' => $Batal], ['Batal1' => $Batal1]); 
   
        $Batal = DB::table('eprop_detail_budget_v')->get();   
        $Batal1 = Bataleprop::all();
        return view('master.batal_eprop.index', ['Batal' => $Batal], ['Batal1' => $Batal1]); 

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
        $ltypeproduct = DB::table('status_eprop')->get();
        return view('master.batal_eprop.create', compact('ltypeproduct')
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
            'status'      =>'required|unique:trx_prop_bataleprop',
            'reason'      =>'required|unique:trx_prop_bataleprop',
            'eprop_id'      =>'required|unique:trx_prop_bataleprop',
            'budget_detail_id'      =>'required|unique:trx_prop_bataleprop'
        );

        $validator = $this->validate($request, $rules);

        $Batal = new Bataleprop; 
        $Batal->area_id   = $request->input('area_id') ; 
        $Batal->area   = $request->input('area') ; 
        $Batal->status   = $request->input('status') ; 
        $Batal->reason   = $request->input('reason') ; 
        $Batal->eprop_id   = $request->input('eprop_id') ;
        $Batal->eprop_no   = $request->input('eprop_no') ;
        $Batal->budget_detail_id   = $request->input('budget_detail_id') ; 
        $Batal->created_by     = Auth::user()->id; 
        $Batal->updated_by     = Auth::user()->id;
        $Batal->save();
                  
        $Success = 'Data berhasil di Cancel!';
        Session::flash('success', $Success); 
        
        $Batal = Bataleprop::all();
        return view('master.batal_eprop.index',['Batal' => $Batal]);

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Batal = Bataleprop_v::all();
        return view('master.batal_eprop.index',['Batal' => $Batal]);
        $Batal = DB::table('eprop_detail_budget_v')->get();   
        return view('master.batal_eprop.index', ['Batal' => $Batal]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
         //$ltypeproduct = DB::table('status_eprop')->get();
         //$Batal = DB::table('eprop_detail_budget_v')->where('budget_detail_id',$id)->first();
         //return view('master.batal_eprop.edit', ['Batal' => $Batal], compact('ltypeproduct'));        
    
         $ltypeproduct = DB::table('status_eprop')->get();     
         $Batal = DB::table('eprop_detail_budget_v')->where('budget_detail_id',$id)->first();
         $Batal1 = DB::table('trx_det_prop_budgetbreak')->where('id',$id)->first();
         return view('master.batal_eprop.edit', ['Batal' => $Batal], compact('ltypeproduct'));        
      
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
        //------------------------
         $rules = array(
            'status'      =>'required',
            'reason'      =>'required',   
            'budget_detail_id'      =>'required|:unique'
        );

        $validator = $this->validate($request, $rules);
       
        
                $Batal = new Bataleprop;     
                $Batal->eprop_id   = $request->input('eprop_id') ;
                $Batal->eprop_id   = $request->input('header_id') ;
                $Batal->eprop_no   = $request->input('eprop_no') ;
                $Batal->budget_detail_id  = $request->input('budget_detail_id') ;
                $Batal->area_id   = $request->input('area_id');
                $Batal->area   = $request->input('area');
                $Batal->reason   = $request->input('reason');

                $Batal->status   = $request->input('status');       
             
                $Batal->created_by     = Auth::user()->id; 
                $Batal->updated_by     = Auth::user()->id;
                $Batal->save();

                $Btl = Bataleprop1::find($id); 
                $Btl->execute_status=$request->input('status');
                $Btl->where("id", '=', $request);
                $Btl->save();

                $Success = 'Data sudah berhasil diBatalkan !';
                Session::flash('success', $Success);                    
             
                $Batal = DB::table('eprop_detail_budget_v')->get();   
                $Batal1 = Bataleprop::all();
                return view('master.batal_eprop.index', ['Batal' => $Batal], ['Batal1' => $Batal1]); 
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
