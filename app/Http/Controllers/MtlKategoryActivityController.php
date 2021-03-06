<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MtlKategoryActivity;
use App\katactivityview;
use Illuminate\Support\Facades\Auth;
use Validator; 
use Session;
use DB;

class MtlKategoryActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     
        //$Persons = DB::table('person_view')->get();   
        //return view('master/persons/index', ['Persons' => $Persons]); 

        $KatAct = katactivityview::all();
       // $KatAct= DB::table('katact_view')->get(); 
        return view('master.kategory_activity.index',['KatAct' => $KatAct]);

       //  $custview = MtlCustomerShip::paginate(6);  
       //  $custAttr = DB::table('mtl_customer_attribute')->where('cust_ship_id')->get();
       //  return view('master/customer_attr/index', ['CustomerView' => $custview]);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $lbudgettype = DB::table('budget_type_view')->get();
        $lgroupid = DB::table('mtl_group_activity')->get();
        return view('master.kategory_activity.create', compact('lgroupid','lbudgettype'));
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
         //
       $rules = array(
            'group_id' => 'required',
            'kategory_name' => 'required|:mtl_kategory_activity',
            'budget_type' => 'required|:mtl_kategory_activity'
         );

        $validator = $this->validate($request, $rules);

        $GrpAct = new MtlKategoryActivity; 
        $GrpAct->group_id = $request->input('group_id') ;
        $GrpAct->kategory_name = $request->input('kategory_name') ;
        $GrpAct->budget_type = $request->input('budget_type') ;
        $GrpAct->flag_region = $request->input('flag_region') ;
        $GrpAct->flag_mt = $request->input('flag_mt') ;
        if ($request->input('active') == 'on') 
            { 
                $GrpAct->active = 'N';
            }
            else
            { 
                $GrpAct->active = 'Y';
            }    
        $GrpAct->created_by = Auth::user()->id; 
        $GrpAct->updated_by = Auth::user()->id;
        $GrpAct->save();

        $Success = 'Data Kategory Activity berhasil di input!';
        Session::flash('success', $Success); 
        
        $KatAct = katactivityview::all();
        return view('master.kategory_activity.index',['KatAct' => $KatAct]);
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

        // $ljobtype = DB::table('job_type_view')->get();
        // $lbrand = DB::table('mtl_brand_produk')->get();
       // return view('master.jobs.edit',['EditJob' => $edit],compact('ljobtype','lbrand'));

        $lbudgettype = DB::table('budget_type_view')->get();
        $lgroupid = DB::table('mtl_group_activity')->get();
        $edit = MtlKategoryActivity::find($id);
        return view('master.kategory_activity.edit',['EditKat' => $edit],compact('lgroupid','lbudgettype'));
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
         $GrpAct = MtlKategoryActivity::findOrFail($id);
        $input = [
            'group_id' => $request['group_id'],
            'kategory_name' => $request['kategory_name'],
            'budget_type' => $request['budget_type']
        ];
        
        $this->validate($request, [
            'group_id' => 'required',
            'kategory_name' => 'required',
            'budget_type' => 'required'
        ]);

        MtlKategoryActivity::where('id', $id)
            ->update($input);
        
        $Success = 'Kategory Activity berhasil di Edit!';
        Session::flash('success', $Success); 
            
       // $KatAct = MtlKategoryActivity::all();
       // return view('master.kategory_activity.index', ['GrpAct' => $KatAct]); 

        $KatAct = katactivityview::all();
       // $KatAct= DB::table('katact_view')->get(); 
        return view('master.kategory_activity.index',['KatAct' => $KatAct]);
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
