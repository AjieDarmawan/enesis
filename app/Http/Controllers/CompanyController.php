<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MtlCompany;
use Illuminate\Support\Facades\Auth;
use Validator; 
use Session;
use DB;

class CompanyController extends Controller
{

    public function index()
    {
        $GrpAct =MtlCompany::all();
        dd($GrpAct);
        return view('master.company.index',['GrpAct' => $GrpAct]);
    }

    public function create()
    {
        return view('master.company.create');
    }

    public function store(Request $request)
    {

        $rules = array(
            'company_code'      =>'required|unique:mtl_company',
            'company_name'      =>'required|unique:mtl_company'
        );

        $validator = $this->validate($request, $rules);

        $GrpAct = new MtlCompany; 
        $GrpAct->company_code   = $request->input('company_code') ; 
        $GrpAct->company_name   = $request->input('company_name') ; 
        $GrpAct->active         = $request->input('active') ;  
        $GrpAct->created_by     = Auth::user()->id; 
        $GrpAct->updated_by     = Auth::user()->id;
        $GrpAct->save();

        $Success = 'Data Company berhasil di input!';
        Session::flash('success', $Success); 
        
        $GrpAct = MtlCompany::all();
        return view('master.company.index',['GrpAct' => $GrpAct]);

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $edit = MtlCompany::find($id);
        return view('master.company.edit',['EditGrp' => $edit]);
    }

    public function update(Request $request, $id)
    {
        $GrpAct = MtlCompany::findOrFail($id);
        $input = [
            'company_code'  => $request['company_code'],
            'company_name'  => $request['company_name'],
            'active'        => $request['active']
        ];
        $this->validate($request, [
            'company_code'  => 'required',
            'company_name'  => 'required',
            'active'        => 'required'

        ]);

        MtlCompany::where('id', $id)
            ->update($input);
        
        $Success = 'Update Company berhasil di Edit!';
        Session::flash('success', $Success); 
            
        $GrpAct = MtlCompany::all();
        return view('master.company.index', ['GrpAct' => $GrpAct]); 
    }

    public function destroy($id)
    {
        //
    }
}
