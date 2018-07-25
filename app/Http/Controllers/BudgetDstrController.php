<?php

namespace App\Http\Controllers;

use Response; 
use Illuminate\Http\Request;
use App\MtlBudgetDstr;
use App\MtlBudgetDstr_View;
use App\MtlBudgetArea;
use app\MtlPersons;
use app\MtlPersonsview;
use app\MtlPersonsArea;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;

class BudgetDstrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$budget_dstr = MtlBudgetDstr_View::all();
        //return view('master.budget_dstr.index',['budget_dstr' => $budget_dstr]);
        
        $budget_dstr = MtlBudgetDstr_View::all();
        return view('master.budget_dstr.index',['budget_dstr' => $budget_dstr]);
   
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        $lbudget = DB::table('trx_budget_allocation')->get();
        $lregion = DB::table('mtl_region')->get(); 
        $lsubregion = DB::table('mtl_subregion')->get(); 
        $larea = DB::table('mtl_area')->get();        
        $lasdh = DB::table('person_area_view')->get(); 
             
        return view('master/budget_dstr/create', compact('lregion', 'lsubregion','larea','lasdh','lbudget'));
        //return view('master/budget_dstr/index', ['budget_dstr' => $budget_dstr])
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
             'budget_dst_id' => 'required|unique:mtl_budget_dst_asdh',
             'asdh_id' => 'required|:mtl_budget_dst_asdh',
             'area_id' => 'required|:mtl_budget_dst_asdh'
            );


//area dan asdh
          if ($request->input('allasdh') == 'on') 
          {
                $budget_dstr = new MtlBudgetDstr;
                $budget_dstr->budget_dst_id = $request->input('budget_dst_id');
                $budget_dstr->area_id = $value->area_id;
                $budget_dstr->asdh_id = $value->person_id;
                $budget_dstr->month = $request->input('month');
                $budget_dstr->year = $request->input('year');
               // $budget_dstr->monthyear = $request->input(strtotime('monthyear'));
                $budget_dstr->budget_amount = $request->input('budget_amount');   
                $budget_dstr->created_by = Auth::user()->id;
                $budget_dstr->updated_by = Auth::user()->id;
                $budget_dstr->save();  
          }  
          else 
          {
                $asdh = db::table('person_area_view')
                ->whereIn('area_id', $request->input('area_id'))
                ->whereIn('person_id', $request->input('asdh_id'))
                ->get();
                
                foreach ($asdh as $key => $value) {
                    # code...
                $budget_dstr = new MtlBudgetDstr;
                $budget_dstr->budget_dst_id = $request->input('budget_dst_id');
                $budget_dstr->area_id = $value->area_id;
                $budget_dstr->asdh_id = $value->person_id;
                $budget_dstr->month = $request->input('month');
                $budget_dstr->year = $request->input('year');
                //$budget_dstr->monthyear = $value->monthyear;
                //$value = date('Y-m', $time);
                //$budget_dstr->monthyear =$request->input(strtotime('monthyear'));
                $budget_dstr->budget_amount = $request->input('budget_amount');   
                $budget_dstr->created_by = Auth::user()->id;
                $budget_dstr->updated_by = Auth::user()->id;
                $budget_dstr->save();     
              }    
          }  
 

        $Success = 'Data budget Asdh berhasil di simpan!';
        Session::flash('success', $Success); 
        
        //$budget_dstr = MtlBudgetDstr::all();
        //return view('master/budget_dstr/index', ['budget_dstr' => $budget_dstr]); 
    
        $budget_dstr = MtlBudgetDstr_View::all();
        return view('master.budget_dstr.index',['budget_dstr' => $budget_dstr]);


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
        //$persons = MtlPersonView::where('person_id',$id)->first(); 
        
        $lsubregion = DB::select('SELECT * from get_person_subregion(?)', [$id]);
        $lregion = DB::select('SELECT * from get_person_region(?)', [$id]);
        $larea = DB::select('SELECT * from get_person_area(?)', [$id]);
        $lasdh = DB::select('SELECT * from person_area_view(?)', [$id]);
        $persons = MtlPersonView::where('person_id',$id)->first(); 
        //$ljob = DB::table('mtl_jobs')->get(); 
        //$lposition = DB::table('position_view')->get(); 
       // return view('master/persons/edit', compact('persons','lposition', 'lregion', 'lsubregion', 'ljob','larea'));  
        return view('master/budget_dstr/edit', compact('lregion', 'lsubregion', 'larea', 'lasdh'));  
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

               
        $rules = array(
            'budget_dst_id' => 'required', 
            'monthyear' => 'required',
            'area_id' => 'required',
            'asdh_id' => 'required',
            'budget_amount' => 'required' 
            );

        $regid =  $request->input('region_id');        

        if (is_null($regid)) {
             
        } else {

            $areaid =  $request->input('area_id');   
            if (is_null($areaid)) {
                $otherErrors = 'Area Tidak boleh Kosong!';
                Session::flash('otherErrors', $otherErrors); 
                return back(); 
            }
            

        }

        $validator = $this->validate($request, $rules);



            $person = new MtlPerson;


            if ($request->input('status') == 'on') { 
                $status = 'Y';
            }
            else { 
                $status = 'N';
            };

            $person = ['name' => $request->input('name'),
                        'position_id' => $request->input('position_id'),
                        'email' => $request->input('email'),
                        'job_id' => $request->input('job_id'),
                        'active' => $status,   
                        'updated_by' => Auth::user()->id];
            
 
            MtlPerson::find($id)->update($person);

            //save to mtl_person_area
            if (!is_null($regid)) { 
                $region_id = array(
                    'area_id' => 'required', 
                    'person_id' => 'required' 
                );

                 $validator = "";


                $persons_id = db::table('mtl_persons')->select('id')->where('name',$request->input('name'))->get(); 
                foreach ($persons_id as $key => $value) {
                            $idperson = $value->id;
                        }  

                $areas =$request->input('area_id'); 
                $arealist=""; 
                
                foreach ($areas as $value){
                    if ($arealist == "") {
                        $arealist = $value;    
                    } else {
                        $arealist = $arealist . ',' . $value;    
                    }
                
                }  
                

                $deletedRows = MtlPersonsArea::where('person_id', $id)->delete(); 

                $region_id = db::table('mtl_area')->whereIn('id',$areas)->get();
                foreach ($region_id as $value){
                    $save_area = [
                        'person_id' => $idperson,
                        'area_id' => $value->id,
                        'region_id' => $value->id_region,
                        'subregion_id' => $value->id_subregion,
                        'created_by' => Auth::user()->id,
                        'updated_by' => Auth::user()->id

                    ];
                   
                    DB::table('mtl_persons_area')->insert(array($save_area));
                   // $save_area=array_push($samtl_persons_areave_area, $save_area);
                } 
                
            }    
        
        $Success = 'Data Personnel Baru berhasil di simpan!';
        Session::flash('success', $Success); 
        
        $Persons = MtlPersonView::all();
        return view('master/budget_dstr/index', ['Persons' => $Persons]);  
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

    /** 
    *   Dependent select2 query
    */

    public function getsubregion($region)
    { 
        $lsubregion = DB::table('mtl_subregion')
                      ->where("id_region",$region)
                      ->select("subregion","id")
                      ->get();

        //dd($lsubregion);
        return Response::json($lsubregion);
    }
 

    public function getarea($subregion)
    {
        $larea = DB::table('mtl_area')
                      ->where("id_subregion",$subregion)
                      ->select("area","id")
                      ->get();

       return Response::json($larea);
    }

      public function getasdh($area) 
     {
        $lasdh = DB::table("person_area_view")
                    ->where("area_id",$area)
                    ->select("name","person_id")
                    ->get();
        return Response::json($lasdh);
     }

//     public function getasdh($area)
//    {
//        $lasdh = DB::view('person_area_view')
//                      ->where("area_id",$larea)
//                      ->select("name","id")
//                      ->get();
//
//      return Response::json($asdh);
    }
//------------------------
    //public function index()

    //{
    //    $countries = DB::table('country')->pluck("name","id");
    //    return view('home',compact('countries'));
    //}

    // public function getStates($id) {
    //    $states = DB::table("state")->where("country_id",$id)->pluck("name","id");

    //    return json_encode($states);

    //}

   

//------------------------    
  
//}
