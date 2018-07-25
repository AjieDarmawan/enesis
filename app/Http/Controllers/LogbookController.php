<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Excel;
use App\Logbook;
;

use Illuminate\Support\Facades\Facades;
use Illuminate\Support\MessageBag;
use DB;
use Maatwebsite\Excel\Excel\create;

class LogbookController extends Controller
{
    function index()
    {
    	   
    	    $logbook = DB::table('eprop_logbook_v')->get();

    	    $company = DB::table('eprop_logbook_v')
    	    ->select('account')
    	    ->groupby('account')
    	    ->get();

    	     $division = DB::table('eprop_logbook_v')
    	    ->select('division')
    	    ->groupby('division')
    	    ->get();

    	     $brand = DB::table('eprop_logbook_v')
    	    ->select('brand')
    	    ->groupby('brand')
    	    ->get();
			
			 $varian = DB::table('eprop_logbook_v')
    	    ->select('varian')
    	    ->groupby('varian')
    	    ->get();

    	     $activity_name = DB::table('eprop_logbook_v')
    	    ->select('activity_name')
    	    ->groupby('activity_name')
    	    ->get();

    	      $type_market_code = DB::table('eprop_logbook_v')
    	    ->select('type_market_code')
    	    ->groupby('type_market_code')
    	    ->get();

              $region = DB::table('eprop_logbook_v')
            ->select('region')
            ->groupby('region')
            ->get();

             $branch = DB::table('eprop_logbook_v')
            ->select('branch')
            ->groupby('branch')
            ->get();


             $execute_status = DB::table('eprop_logbook_v')
            ->select('execute_status')
            ->groupby('execute_status')
            ->get();

              $company_name = DB::table('eprop_logbook_v')
            ->select('company_name')
            ->groupby('company_name')
            ->get();

    	    
	
    	    
    	    

    		return view('master.form_logbook.v_logbook',compact('logbook','company','division','brand','varian','activity_name','type_market_code','region','branch','execute_status','company_name'));

    }


	// 	public function  importExport(){ 
	// 		    return view('produk.excel');
	// 		}
		

	// 	public function exportExcel()
	// 	{ 
	// 		    $produk =  Produk::select('kode_produk','id_kategori','nama_produk','harga_jual')->get(); 
	// 		    return Excel::create('dataproduk',  function($excel) use($produk){
	// 		          $excel->sheet('mysheet',  function($sheet) use($produk){
	// 		          $sheet->fromArray($produk);
	// 		          });
	// 		    })->download('xls');
	// 	}


	// 	public function importExcel(Request $request) {
	// 		    if($request->hasFile('file')){
	// 		        $path = $request->file('file')->getRealPath();
	// 		        $data = Excel::load($path, function($reader){})->get();
	// 		        if(!empty($data) && $data->count()){
	// 		            foreach($data as $key=>$val){
	// 		               $produk = new Produk;
	// 		               $produk->kode_produk = $val->kode_produk;
	// 		               $produk->nama_produk = $val->nama_produk;
	// 		               $produk->id_kategori = $val->id_kategori;
	// 		               $produk->harga_jual = $val->harga_jual;
	// 		               $produk->save();
	// 		           }
	// 		        }
	// 		   }
 //  		return back();
	// }


	public function exportExcel()
    {
    	 $data = Logbook::get()->toArray();
    	 return Excel::create('Form Logbook', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->cell('A1', function($cell) {$cell->setValue('First Name');   });
                $sheet->cell('B1', function($cell) {$cell->setValue('Last Name');   });
                $sheet->cell('C1', function($cell) {$cell->setValue('Email');   });
                if (!empty($data)) {
                    foreach ($data as $key => $value) {
                        $i= $key+2;
                        $sheet->cell('A'.$i, $value['reco_no']); 
                        $sheet->cell('B'.$i, $value['account']); 
                        $sheet->cell('C'.$i, $value['brand']); 
                    }
                }
            });
        })->download('xlsx');

    //       $produk = DB::table('eprop_logbook_v')->get();
    // return Excel::create('dataproduk',  function($excel) use($produk){
    //       $excel->sheet('mysheet',  function($sheet) use($produk){
    //       $sheet->fromArray($produk);
    //       });
    // })->download('xls');

       //return Excel::download(new Logbook, 'invoices.xlsx');

    } 

    function search(Request $request){
       // echo "string";

          $account_name     = $request->account_name;
          $division         = $request->division;
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
          $execute_status   = $request->execute_status;

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


         
           $data = DB::table('eprop_logbook_v')
                 ->where('start_date', '>=', $tgl)
                  ->where('end_date', '<=', $tgl1)
                  ->orWhere('company_name','=',$company_name)
                  ->orWhere('division','=',$division)
                  ->orWhere('region','=',$region)
                  ->orWhere('type_market_code','=',$type_market_code)
                  ->orWhere('account','=',$account)
                  ->orWhere('branch','=',$branch)
                  ->orWhere('brand','=',$brand)
                  ->orWhere('varian','=',$varian)
                  ->orWhere('activity_name','=',$activity_name)
                  ->orWhere('execute_status','=',$execute_status)
                  ->get();

         //          echo "<pre>";
         //          print_r($data);
         //          echo "</pre>";

         // //          foreach ($data as $key => $value) {
         // //                echo $value->division;
         // //           } 

         //  die;
          //$data = Logbook::get()->toArray();
         return Excel::create('Form Logbook', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->cell('A1', function($cell) {$cell->setValue('approved_date');   });
                $sheet->cell('B1', function($cell) {$cell->setValue('proposal_date');   });
                $sheet->cell('C1', function($cell) {$cell->setValue('revision_no');   });
                $sheet->cell('D1', function($cell) {$cell->setValue('subject');   });
                 $sheet->cell('E1', function($cell) {$cell->setValue('division');   });
                  $sheet->cell('F1', function($cell) {$cell->setValue('region');   });
                   $sheet->cell('G1', function($cell) {$cell->setValue('branch');   });
                    $sheet->cell('H1', function($cell) {$cell->setValue('account');   });

                   $sheet->cell('I1', function($cell) {$cell->setValue('brand');   });
                   $sheet->cell('J1', function($cell) {$cell->setValue('varian');   });
                   $sheet->cell('K1', function($cell) {$cell->setValue('activity_name');   });
                   $sheet->cell('L1', function($cell) {$cell->setValue('Market Type');   });
                   $sheet->cell('M1', function($cell) {$cell->setValue('Reco No');   });

                    $sheet->cell('N1', function($cell) {$cell->setValue('reco_budget');   });
                   $sheet->cell('O1', function($cell) {$cell->setValue('jml_target_proposal');   });
                   $sheet->cell('P1', function($cell) {$cell->setValue('target_sales');   });
                   $sheet->cell('Q1', function($cell) {$cell->setValue('execute_status');   });
                   $sheet->cell('R1', function($cell) {$cell->setValue('actual_claim');   });
                    $sheet->cell('S1', function($cell) {$cell->setValue('remain_budget');   });



                if (!empty($data)) {
                    foreach ($data as $key => $value) {
                        $i= $key+2;
                        $sheet->cell('A'.$i, $value->last_approved_date); 
                        $sheet->cell('B'.$i, $value->proposal_date); 
                        $sheet->cell('C'.$i, $value->revision_no); 
                        $sheet->cell('D'.$i, $value->subject);
                        $sheet->cell('E'.$i, $value->division); 
                        $sheet->cell('F'.$i, $value->region);
                         $sheet->cell('G'.$i, $value->branch); 
                        $sheet->cell('H'.$i, $value->account);

                        $sheet->cell('I'.$i, $value->brand);
                        $sheet->cell('J'.$i, $value->varian); 
                        $sheet->cell('K'.$i, $value->activity_name);
                        $sheet->cell('L'.$i, $value->type_market_code); 
                        $sheet->cell('M'.$i, $value->reco_no);


                        $sheet->cell('N'.$i, $value->reco_budget);
                        $sheet->cell('O'.$i, $value->jml_target_proposal); 
                        $sheet->cell('P'.$i, $value->target_sales);
                        $sheet->cell('Q'.$i, $value->execute_status); 
                        $sheet->cell('R'.$i, $value->actual_claim);
                        $sheet->cell('S'.$i, $value->remain_budget);


                    }
                }
            });
        })->download('xlsx');

    }


}
