<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;

class Result_implementationController extends Controller
{
    function index(){
    	$status = DB::table('eprop_report_result')->get();

    	    $company = DB::table('eprop_report_result')
    	    ->select('company_name')
    	    ->groupby('company_name')
    	    ->get();

    	     $division = DB::table('eprop_report_result')
    	    ->select('division')
    	    ->groupby('division')
    	    ->get();

              $region = DB::table('eprop_report_result')
            ->select('region')
            ->groupby('region')
            ->get();

    	     $branch = DB::table('eprop_report_result')
    	    ->select('branch')
    	    ->groupby('branch')
    	    ->get();

             $executor_name = DB::table('eprop_report_result')
            ->select('executor')
            ->groupby('executor')
            ->get();


             $brand = DB::table('eprop_report_result')
            ->select('brand_name')
            ->groupby('brand_name')
            ->get();


    	     $activity_name = DB::table('eprop_report_result')
    	    ->select('activity_name')
    	    ->groupby('activity_name')
    	    ->get();

			
			 $account = DB::table('eprop_report_result')
    	    ->select('account')
    	    ->groupby('account')
    	    ->get();

    	      $distributor = DB::table('eprop_report_result')
            ->select('distributor')
            ->groupby('distributor')
            ->get();



  
    	    
	
    	    
    	    

    		return view('master.form_report.v_report_implementation_result',compact('status','company','division','branch','region','brand','executor_name','activity_name','account','distributor'));

			 //return view('master.form_report.v_report_status');
    }



          function search(Request $request){
       // echo "string";

          $account_name     = $request->account_name;
          $division_name    = $request->division_name;
          $area             = $request->area;  
          $company_name     = $request->company_name;
          // $Periode          = $request->Periode;
          $region           = $request->region;
          $type_market_code = $request->type_market_code;

          $account          = $request->account;
          $branch           = $request->branch;
          $brand            = $request->brand;

          $varian           = $request->varian;
          $activity_name    = $request->activity_name;
          $excekutor   = $request->executor_name;

         
            error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
            $tanggal=  substr($Periode,0,2 );
            $bulan  =  substr($Periode, 3,2);
            $tahun  =  substr($Periode, 6,4);

            $tanggal1=  substr($Periode,13,2 );
            $bulan1  =  substr($Periode, 16,2);
            $tahun1  =  substr($Periode, 19,4);

           

         $tgl = $tahun."-".$bulan."-".$tanggal;
         
            $tgl1 = $tahun1."-".$bulan1."-".$tanggal1;



         
         
           $data = DB::table('eprop_report_result')
                  // ->orwhere('periode', '=', $Periode)
               
                  ->orWhere('company_name','=',$company_name)
                  ->orWhere('division','=',$division_name)
                  ->orWhere('region','=',$region)
                  // ->orWhere('type_market_code','=',$type_market_code)
                   ->orWhere('account','=',$account_name)
                  ->orWhere('branch','=',$branch)
                  ->orWhere('brand_name','=',$brand)
                  ->orWhere('distributor','=',$distributor)
                  ->orWhere('activity_name','=',$activity_name)
                  ->orWhere('executor','=',$excekutor)
                  ->get();

       
         return Excel::create('Report Result', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                    $sheet->cell('A1', function($cell) {$cell->setValue('division_name');   });
                    $sheet->cell('B1', function($cell) {$cell->setValue('region');   });
                    $sheet->cell('C1', function($cell) {$cell->setValue('branch');   });
                    $sheet->cell('D1', function($cell) {$cell->setValue('brand');   });
                    $sheet->cell('E1', function($cell) {$cell->setValue('varian');   });
                    $sheet->cell('F1', function($cell) {$cell->setValue('activity');   });
                    $sheet->cell('G1', function($cell) {$cell->setValue('reco_no');   });
                    $sheet->cell('H1', function($cell) {$cell->setValue('excekutor');   });

                   $sheet->cell('I1', function($cell) {$cell->setValue('eprop no');   });
                   $sheet->cell('J1', function($cell) {$cell->setValue('distributor');   });
                   $sheet->cell('K1', function($cell) {$cell->setValue('account');   });
                   $sheet->cell('L1', function($cell) {$cell->setValue('eo');   });
                   $sheet->cell('M1', function($cell) {$cell->setValue('budget');   });

                   $sheet->cell('N1', function($cell) {$cell->setValue('promo_activity_target_name');   });
                   $sheet->cell('O1', function($cell) {$cell->setValue('promo_activity_target_achieve');   });
                   $sheet->cell('P1', function($cell) {$cell->setValue('promo_activity_actual_achieve');   });
                   $sheet->cell('Q1', function($cell) {$cell->setValue('target_sales_');   });
                   $sheet->cell('R1', function($cell) {$cell->setValue('actual_sales');   });
                  

                   $sheet->cell('S1', function($cell) {$cell->setValue('cost_ratio');   });
                   $sheet->cell('T1', function($cell) {$cell->setValue('actual_cost_ratio');   });
                   $sheet->cell('U1', function($cell) {$cell->setValue('result_implement_descr');   });
                   $sheet->cell('V1', function($cell) {$cell->setValue('status');   });

                   $sheet->cell('W1', function($cell) {$cell->setValue('budget');   });
                   $sheet->cell('X1', function($cell) {$cell->setValue('Result Program');   });
              



                if (!empty($data)) {
                    foreach ($data as $key => $value) {
                        $i= $key+2;
                        $sheet->cell('A'.$i, $value->division); 
                        $sheet->cell('B'.$i, $value->region); 
                        $sheet->cell('C'.$i, $value->branch); 
                        $sheet->cell('D'.$i, $value->brand);
                        $sheet->cell('E'.$i, $value->varian); 
                        $sheet->cell('F'.$i, $value->activity_name);
                         $sheet->cell('G'.$i, $value->reco_no); 
                        $sheet->cell('H'.$i, $value->excekutor);

                        $sheet->cell('I'.$i, $value->eprop_no);
                        $sheet->cell('J'.$i, $value->distributor); 
                        $sheet->cell('K'.$i, $value->account);
                        $sheet->cell('L'.$i, $value->eo); 
                        $sheet->cell('M'.$i, $value->budget);


                        $sheet->cell('N'.$i, $value->promo_activity_target_name);
                        $sheet->cell('O'.$i, $value->promo_activity_target_achieve); 
                        $sheet->cell('P'.$i, $value->promo_activity_actual_achieve);
                        $sheet->cell('Q'.$i, $value->target_sales_); 
                        $sheet->cell('R'.$i, $value->actual_sales);


                        $sheet->cell('S'.$i, $value->cost_ratio);
                        $sheet->cell('T'.$i, $value->actual_cost_ratio);
                        $sheet->cell('U'.$i, $value->result_implement_descr);
                        $sheet->cell('V'.$i, $value->status);
                        $sheet->cell('W'.$i, $value->budget);
                        $sheet->cell('X'.$i, $value->result_implement_descr);

                    }
                }
            });
        })->download('xlsx');

    }
}
