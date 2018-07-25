<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;

class Canceled_executorController extends Controller
{
    function index(){
    	$status = DB::table('eprop_report_cancelled_v')->get();

    	    $company = DB::table('eprop_report_cancelled_v')
    	    ->select('company_name')
    	    ->groupby('company_name')
    	    ->get();

    	     $division = DB::table('eprop_report_cancelled_v')
    	    ->select('division')
    	    ->groupby('division')
    	    ->get();

              $region = DB::table('eprop_report_cancelled_v')
            ->select('region')
            ->groupby('region')
            ->get();

    	     $branch = DB::table('eprop_report_cancelled_v')
    	    ->select('branch')
    	    ->groupby('branch')
    	    ->get();

             $executor_name = DB::table('eprop_report_cancelled_v')
            ->select('executor')
            ->groupby('executor')
            ->get();


             $brand = DB::table('eprop_report_cancelled_v')
            ->select('brand')
            ->groupby('brand')
            ->get();


    	     $activity_name = DB::table('eprop_report_cancelled_v')
    	    ->select('activity')
    	    ->groupby('activity')
    	    ->get();

			
			 $account = DB::table('eprop_report_cancelled_v')
    	    ->select('account')
    	    ->groupby('account')
    	    ->get();

    	      $distributor = DB::table('eprop_report_cancelled_v')
            ->select('distributor')
            ->groupby('distributor')
            ->get();

;

    // // // 	      $type_market_code = DB::table('eprop_rpt_perstatus_v')
    // // // 	    ->select('type_market_code')
    // // // 	    ->groupby('type_market_code')
    // // // 	    ->get();

  


    
            

    //           $tracker = DB::table('eprop_rpt_perstatus_v')
    //         ->select('tracker')
    //         ->groupby('tracker')
    //         ->get();

    	    
	
    	    
    	    

    		return view('master.form_report.v_report_cancel',compact('status','company','division','branch','region','brand','executor_name','activity_name','account','distributor'));

			 //return view('master.form_report.v_report_status');
    }

function search(Request $request){
       // echo "string";

          $account           = $request->account;
          $division         = $request->division_name;
          $area             = $request->area;  
          $company_name     = $request->company_name;
          $Periode          = $request->Periode;
          $region           = $request->region;
          $type_market_code = $request->type_market_code;

          $account          = $request->account;
          $branch           = $request->branch;
          $brand            = $request->brand;

          $varian           = $request->varian;
          $activity_name    = $request->activity;
          $executor_name   = $request->executor_name;

            // $data = DB::table('eprop_logbook_v')
            // ->orWhereBetween('')
            // ->get();


         // echo $Periode;
         
            error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
            $tanggal=  substr($Periode,0,2 );
            $bulan  =  substr($Periode, 3,2);
            $tahun  =  substr($Periode, 6,4);

            $tanggal1=  substr($Periode,13,2 );
            $bulan1  =  substr($Periode, 16,2);
            $tahun1  =  substr($Periode, 19,4);

           

          $tgl = $tahun."-".$bulan."-".$tanggal;
         
           $tgl1 = $tahun1."-".$bulan1."-".$tanggal1;

           // $data = DB::table('eprop_logbook_v')
           //        ->where('start_date', '>=', $tgl)
           //        ->where('end_date', '<=', $tgl1)
                  
           //        ->get();

        //print_r($data);

         
           $data = DB::table('eprop_report_cancelled_v')
                 // ->where('start_date', '>=', $tgl)
                 //  ->where('end_date', '<=', $tgl1)
                  ->orWhere('proposal_date','=',$Periode)
                  ->orWhere('company_name','=',$company_name)
                  ->orWhere('company_name','=',$company_name)
                  ->orWhere('division','=',$division)
                  ->orWhere('region','=',$region)
                  
                  ->orWhere('account','=',$account)
                  ->orWhere('branch','=',$branch)
                  ->orWhere('brand','=',$brand)
                  ->orWhere('varian','=',$varian)
                  ->orWhere('activity','=',$activity_name)
                  ->orWhere('executor_name','=',$executor_name)
                  ->get();

         //          echo "<pre>";
         //          print_r($data);
         //          echo "</pre>";

         // //          foreach ($data as $key => $value) {
         // //                echo $value->division;
         // //           } 

         //  die;
          //$data = Logbook::get()->toArray();
         return Excel::create('Report Cancel Excekutor', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->cell('A1', function($cell) {$cell->setValue('periode');   });
                $sheet->cell('B1', function($cell) {$cell->setValue('proposal_date');   });
                $sheet->cell('C1', function($cell) {$cell->setValue('proposal_no');   });
                $sheet->cell('D1', function($cell) {$cell->setValue('subject');   });
                 $sheet->cell('E1', function($cell) {$cell->setValue('division');   });
                  $sheet->cell('F1', function($cell) {$cell->setValue('region');   });
                   $sheet->cell('G1', function($cell) {$cell->setValue('branch');   });
                    $sheet->cell('H1', function($cell) {$cell->setValue('account');   });

                   $sheet->cell('I1', function($cell) {$cell->setValue('brand');   });
                   $sheet->cell('J1', function($cell) {$cell->setValue('distributor');   });
                   $sheet->cell('K1', function($cell) {$cell->setValue('eo');   });
                   $sheet->cell('L1', function($cell) {$cell->setValue('executor');   });
                   $sheet->cell('M1', function($cell) {$cell->setValue('varian');   });

                    $sheet->cell('N1', function($cell) {$cell->setValue('activity');   });
                   $sheet->cell('O1', function($cell) {$cell->setValue('market_type');   });
                   $sheet->cell('P1', function($cell) {$cell->setValue('reco no');   });
                   $sheet->cell('Q1', function($cell) {$cell->setValue('budget');   });
                   $sheet->cell('R1', function($cell) {$cell->setValue('cancelled_reason');   });
                  



                if (!empty($data)) {
                    foreach ($data as $key => $value) {
                        $i= $key+2;
                        $sheet->cell('A'.$i, $value->periode); 
                        $sheet->cell('B'.$i, $value->proposal_date); 
                        $sheet->cell('C'.$i, $value->proposal_no); 
                        $sheet->cell('D'.$i, $value->subject);
                        $sheet->cell('E'.$i, $value->division); 
                        $sheet->cell('F'.$i, $value->region);
                         $sheet->cell('G'.$i, $value->branch); 
                        $sheet->cell('H'.$i, $value->account);

                        $sheet->cell('I'.$i, $value->brand);
                        $sheet->cell('J'.$i, $value->distributor); 
                        $sheet->cell('K'.$i, $value->eo);
                        $sheet->cell('L'.$i, $value->executor); 
                        $sheet->cell('M'.$i, $value->varian);


                        $sheet->cell('N'.$i, $value->activity_name);
                        $sheet->cell('O'.$i, $value->market_type); 
                        $sheet->cell('P'.$i, $value->reco_no);
                        $sheet->cell('Q'.$i, $value->budget); 
                        $sheet->cell('R'.$i, $value->cancelled_reason);
                       

                    }
                }
            });
        })->download('xlsx');

    }
}
