<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;

class Report_AutoCloseController extends Controller
{
    function index(){
    	$status = DB::table('eprop_report_autoclosed_v')->get();

    	    $company = DB::table('eprop_report_autoclosed_v')
    	    ->select('company_name')
    	    ->groupby('company_name')
    	    ->get();

    	     $division = DB::table('eprop_report_autoclosed_v')
    	    ->select('division')
    	    ->groupby('division')
    	    ->get();

              $region = DB::table('eprop_report_autoclosed_v')
            ->select('region')
            ->groupby('region')
            ->get();

    	     $branch = DB::table('eprop_report_autoclosed_v')
    	    ->select('branch')
    	    ->groupby('branch')
    	    ->get();

             $executor_name = DB::table('eprop_report_autoclosed_v')
            ->select('executor')
            ->groupby('executor')
            ->get();


             $brand = DB::table('eprop_report_autoclosed_v')
            ->select('brand')
            ->groupby('brand')
            ->get();


    	     $activity_name = DB::table('eprop_report_autoclosed_v')
    	    ->select('activity')
    	    ->groupby('activity')
    	    ->get();

			
			 $account = DB::table('eprop_report_autoclosed_v')
    	    ->select('account')
    	    ->groupby('account')
    	    ->get();

    	      $distributor = DB::table('eprop_report_autoclosed_v')
            ->select('distributor')
            ->groupby('distributor')
            ->get();


    		return view('master.form_report.v_report_autoclose',compact('status','company','division','branch','region','brand','executor_name','activity_name','account','distributor'));

			 //return view('master.form_report.v_report_status');
    }




         function search(Request $request){
       // echo "string";

          $account_name     = $request->account;
          $division_name         = $request->division_name;
          $area             = $request->area;  
          $company_name     = $request->company_name;
          $Periode          = $request->Periode;
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



         
         
           $data = DB::table('eprop_report_autoclosed_v')
                  ->orwhere('periode', '=', $Periode)
               
                  ->orWhere('company_name','=',$company_name)
                  ->orWhere('division','=',$division_name)
                  ->orWhere('region','=',$region)
                  // ->orWhere('type_market_code','=',$type_market_code)
                  // ->orWhere('account','=',$account)
                   ->orWhere('account','=',$account)
                  ->orWhere('brand','=',$brand)
                  ->orWhere('distributor','=',$distributor)
                  ->orWhere('activity','=',$activity_name)
                  ->orWhere('executor','=',$excekutor)
                  ->get();

       
         return Excel::create('Report autoclosed', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->cell('A1', function($cell) {$cell->setValue('proposal_date');   });
                $sheet->cell('B1', function($cell) {$cell->setValue('proposal_no');   });
                $sheet->cell('C1', function($cell) {$cell->setValue('periode');   });
                $sheet->cell('D1', function($cell) {$cell->setValue('subject');   });
                 $sheet->cell('E1', function($cell) {$cell->setValue('division_name');   });
                  $sheet->cell('F1', function($cell) {$cell->setValue('region');   });
                   $sheet->cell('G1', function($cell) {$cell->setValue('branch');   });
                    $sheet->cell('H1', function($cell) {$cell->setValue('distributor');   });

                   $sheet->cell('I1', function($cell) {$cell->setValue('account');   });
                   $sheet->cell('J1', function($cell) {$cell->setValue('eo');   });
                   $sheet->cell('K1', function($cell) {$cell->setValue('excekutor');   });
                   $sheet->cell('L1', function($cell) {$cell->setValue('brand ');   });
                   $sheet->cell('M1', function($cell) {$cell->setValue('varian');   });

                    $sheet->cell('N1', function($cell) {$cell->setValue('activity_name');   });
                   $sheet->cell('O1', function($cell) {$cell->setValue('reco no');   });
                   $sheet->cell('P1', function($cell) {$cell->setValue('market_type');   });
                   $sheet->cell('Q1', function($cell) {$cell->setValue('budget');   });
                   // $sheet->cell('R1', function($cell) {$cell->setValue('actual_claim');   });
                   //  $sheet->cell('S1', function($cell) {$cell->setValue('remain_budget');   });



                if (!empty($data)) {
                    foreach ($data as $key => $value) {
                        $i= $key+2;
                        $sheet->cell('A'.$i, $value->proposal_date); 
                        $sheet->cell('B'.$i, $value->proposal_no); 
                        $sheet->cell('C'.$i, $value->periode); 
                        $sheet->cell('D'.$i, $value->subject);
                        $sheet->cell('E'.$i, $value->division); 
                        $sheet->cell('F'.$i, $value->region);
                         $sheet->cell('G'.$i, $value->branch); 
                        $sheet->cell('H'.$i, $value->distributor);

                        $sheet->cell('I'.$i, $value->account);
                        $sheet->cell('J'.$i, $value->eo); 
                        $sheet->cell('K'.$i, $value->excekutor);
                        $sheet->cell('L'.$i, $value->brand); 
                        $sheet->cell('M'.$i, $value->varian);


                        $sheet->cell('N'.$i, $value->activity_name);
                        $sheet->cell('O'.$i, $value->reco_no); 
                        $sheet->cell('P'.$i, $value->market_type);
                        $sheet->cell('Q'.$i, $value->budget); 
                        // $sheet->cell('R'.$i, $value->actual_claim);
                        // $sheet->cell('S'.$i, $value->remain_budget);


                    }
                }
            });
        })->download('xlsx');

    }
}
