<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;

class PerstatusController extends Controller
{
    

		function index(){

			  $status = DB::table('eprop_rpt_perstatus_v')->get();

    // 	    $company = DB::table('eprop_rpt_perstatus_v')
    // 	    ->select('account')
    // 	    ->groupby('account')
    // 	    ->get();

    	     $division = DB::table('eprop_rpt_perstatus_v')
    	    ->select('division_name')
    	    ->groupby('division_name')
    	    ->get();

    	     $brand = DB::table('eprop_rpt_perstatus_v')
    	    ->select('brand_name')
    	    ->groupby('brand_name')
    	    ->get();
			
			 $varian = DB::table('eprop_rpt_perstatus_v')
    	    ->select('produk_name')
    	    ->groupby('produk_name')
    	    ->get();

    	     $activity_name = DB::table('eprop_rpt_perstatus_v')
    	    ->select('activity_name')
    	    ->groupby('activity_name')
    	    ->get();

    // // 	      $type_market_code = DB::table('eprop_rpt_perstatus_v')
    // // 	    ->select('type_market_code')
    // // 	    ->groupby('type_market_code')
    // // 	    ->get();

              $region = DB::table('eprop_rpt_perstatus_v')
            ->select('region')
            ->groupby('region')
            ->get();

             $area = DB::table('eprop_rpt_perstatus_v')
            ->select('area')
            ->groupby('area')
            ->get();


             $executor_name = DB::table('eprop_rpt_perstatus_v')
            ->select('executor_name')
            ->groupby('executor_name')
            ->get();

              $company_name = DB::table('eprop_rpt_perstatus_v')
            ->select('company_name')
            ->groupby('company_name')
            ->get();


              $tracker = DB::table('eprop_rpt_perstatus_v')
            ->select('tracker')
            ->groupby('tracker')
            ->get();

             $status = DB::table('eprop_rpt_perstatus_v')
            ->select('last_status')
            ->groupby('last_status')
            ->get();

    	    
	
    	    
    	    

    		return view('master.form_report.v_report_status',compact('status','company_name','region','activity_name','varian','brand','area','division','executor_name','tracker','status'));

			 //return view('master.form_report.v_report_status');
		}


         function search(Request $request){
       // echo "string";

          $account_name     = $request->account_name;
          $division_name    = $request->division_name;
          $area             = $request->area;  
          $company_name     = $request->company_name;
          $Periode          = $request->Periode;
          $region           = $request->region;
          $type_market_code = $request->type_market_code;

          $account          = $request->account;
          $branch           = $request->area;
          $brand            = $request->brand;

          $varian           = $request->varian;
          $activity_name    = $request->activity_name;
          $executor_name   = $request->executor_name;

          $tracker   = $request->tracker;

          

         
            error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
            $tanggal=  substr($Periode,0,2 );
            $bulan  =  substr($Periode, 3,2);
            $tahun  =  substr($Periode, 6,4);

            $tanggal1=  substr($Periode,13,2 );
            $bulan1  =  substr($Periode, 16,2);
            $tahun1  =  substr($Periode, 19,4);

           

            $tgl = $tahun."-".$bulan."-".$tanggal;
            $tgl1 = $tahun1."-".$bulan1."-".$tanggal1;


           $data = DB::table('eprop_rpt_perstatus_v')
                  ->orwhere('start_date', '>=', $tgl)
                  ->orwhere('end_date', '<=', $tgl1)
                  ->orWhere('company_name','=',$company_name)
                  ->orWhere('division_name','=',$division_name)
                  ->orWhere('region','=',$region)
                   ->orWhere('tracker','=',$tracker)
                   ->orWhere('produk_name','=',$varian)
                  ->orWhere('branch','=',$branch)
                  ->orWhere('brand_name','=',$brand)
                  ->orWhere('produk_name','=',$varian)
                  ->orWhere('activity_name','=',$activity_name)
                  ->orWhere('executor_name','=',$executor_name)
                  ->get();

       
         return Excel::create('Form perstatus', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                 $sheet->cell('A1', function($cell) {$cell->setValue('Proposal no');   });
                $sheet->cell('B1', function($cell) {$cell->setValue('periode');   });
                // $sheet->cell('C1', function($cell) {$cell->setValue('revision_no');   });
                      $sheet->cell('D1', function($cell) {$cell->setValue('subject');   });
                      $sheet->cell('E1', function($cell) {$cell->setValue('division_name');   });
                      $sheet->cell('F1', function($cell) {$cell->setValue('region');   });
                      $sheet->cell('G1', function($cell) {$cell->setValue('branch');   });
                      $sheet->cell('H1', function($cell) {$cell->setValue('account');   });

                   $sheet->cell('I1', function($cell) {$cell->setValue('Distributor');   });
                   $sheet->cell('J1', function($cell) {$cell->setValue('eo');   });
                   $sheet->cell('K1', function($cell) {$cell->setValue('tracker');   });
                   $sheet->cell('L1', function($cell) {$cell->setValue('executor');   });
                   $sheet->cell('M1', function($cell) {$cell->setValue('Brand');   });

                    $sheet->cell('N1', function($cell) {$cell->setValue('varian');   });
                   $sheet->cell('O1', function($cell) {$cell->setValue('activty');   });
                   $sheet->cell('P1', function($cell) {$cell->setValue('reco no');   });
                   $sheet->cell('Q1', function($cell) {$cell->setValue('last_status');   });
                   $sheet->cell('R1', function($cell) {$cell->setValue('next_status');   });
                    $sheet->cell('S1', function($cell) {$cell->setValue('over_due');   });
                     $sheet->cell('T1', function($cell) {$cell->setValue('budget');   });



                if (!empty($data)) {
                    foreach ($data as $key => $value) {
                        $i= $key+2;
                        $sheet->cell('A'.$i, $value->proposal_no); 
                        $sheet->cell('B'.$i, $value->eprop_period); 
                        // $sheet->cell('C'.$i, $value->revision_no); 
                        $sheet->cell('D'.$i, $value->subject);
                        $sheet->cell('E'.$i, $value->division_name); 
                        $sheet->cell('F'.$i, $value->region);
                         $sheet->cell('G'.$i, $value->area); 
                        $sheet->cell('H'.$i, $value->account);

                        $sheet->cell('I'.$i, $value->distributor);
                        $sheet->cell('J'.$i, $value->eo); 
                        $sheet->cell('K'.$i, $value->tracker);
                        $sheet->cell('L'.$i, $value->executor_name); 
                        $sheet->cell('M'.$i, $value->brand_name);


                        $sheet->cell('N'.$i, $value->reco_budget);
                        $sheet->cell('O'.$i, $value->activity_name); 
                        $sheet->cell('P'.$i, $value->reco_no);
                        $sheet->cell('Q'.$i, $value->last_status); 
                        $sheet->cell('R'.$i, $value->next_status);
                        $sheet->cell('S'.$i, $value->over_due);
                        $sheet->cell('T'.$i, $value->budget_amount);


                    }
                }
            });
        })->download('xlsx');

    }

}
