<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MtlJobs;
use Illuminate\Support\Facades\Auth;
use Validator; 
use Session;
use DB;


class MtlJobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Job = MtlJobs::all();
        return view('master.jobs.index',['IJob' => $Job]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $ljobtype = DB::table('job_type_view')->get();
         $lbrand = DB::table('mtl_brand_produk')->get();
         return view('master.jobs.create', compact('lbrand'), compact('ljobtype'));
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
            'job_code' => 'required|unique:mtl_jobs',
            'job_description' => 'required|:mtl_jobs',
            'job_brand' => 'required|:mtl_jobs',
            'job_type' => 'required|:mtl_jobs',
            'active' => 'required|:mtl_jobs'
            );

        $validator = $this->validate($request, $rules);

        $GrpAct = new MtlJobs; 
        $GrpAct->job_code = $request->input('job_code') ;
        $GrpAct->job_description = $request->input('job_description') ;
        $GrpAct->job_brand = $request->input('job_brand') ;
        $GrpAct->job_type = $request->input('job_type') ; 
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

        $Success = 'Data Jobs berhasil di input!';
        Session::flash('success', $Success); 
        
        //$GrpAct = MtlJobs::all();
        //return view('master.jobs.index',['GrpAct' => $GrpAct]);
        $Job = MtlJobs::all();
        return view('master.jobs.index',['IJob' => $Job]);
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
        //$lgroupid = DB::table('mtl_group_activity')->get();
        $ljobtype = DB::table('job_type_view')->get();
        $lbrand = DB::table('mtl_brand_produk')->get();
        $edit = MtlJobs::find($id);
        //return view('master.jobs.edit',['EditJob' => $edit]);
        return view('master.jobs.edit',['EditJob' => $edit],compact('ljobtype','lbrand'));

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
      
        $GrpAct = MtlJobs::findOrFail($id);
        $input = [
            'job_code' => $request['job_code'],
            'job_description' => $request['job_description'],
            'job_brand' => $request['job_brand'],
            'job_type' => $request['job_type']
        ];
        $this->validate($request, [
            'job_code' => 'required',
            'job_description' => 'required',
            'job_brand' => 'required',
            'job_type' => 'required'
        ]);
        MtlJobs::where('id', $id)
            ->update($input);
        
        $Success = 'Jobs berhasil di Edit!';
        Session::flash('success', $Success); 
            
        //$GrpAct = MtlJobs::all();
        //return view('master.jobs.index', ['GrpAct' => $GrpAct]);
        $Job = MtlJobs::all();
        return view('master.jobs.index',['IJob' => $Job]);
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
