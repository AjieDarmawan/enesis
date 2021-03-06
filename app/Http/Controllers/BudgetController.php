<?php

namespace App\Http\Controllers;


use Illuminate\Support\MessageBag;
use Illuminate\Http\Request;
use App\MTLCompany;
use Validator;
use Carbon;
use Session;
use Illuminate\Support\Facades\Input;
use Excel;
use Auth;
use DB;


class BudgetController extends Controller
{
    /**
    * Return View file
    * @var array
    */

    protected $x;
    protected $MsgErr;  
    protected $messageErr;
    protected $total_budget;
    protected $budget_year;
    protected $company_id;
    protected $budget_detail;
    protected $budget_master;

    public function upload_budget_str() {
    	$yearNow  = Carbon\Carbon::now()->year;
    	$year5  = Carbon\Carbon::now()->addyear(5)->year;	
 
		//$company = DB::table('mtl_company')->get();
		
        $company =  Session::Get('user_company');

    	return view('budget.upload_budget_str', compact('company', 'yearNow', 'year5'));
    }

    public  function DownloadBudgetHI() {


        $data = DB::table('budget_detail_excel_v')->where('company_code','=','MM1')->get()->toArray();

        return Excel::create('budget_template_HI',function($excel) use ($data) {
            $excel->sheet('budget', function($sheet) use ($data)
            {
                    $sheet->cell('A1', function($cell) {$cell->setValue('No.');   });
                    $sheet->cell('B1', function($cell) {$cell->setValue('brand_id');   });
                    $sheet->cell('C1', function($cell) {$cell->setValue('brand_code');   });
                    $sheet->cell('D1', function($cell) {$cell->setValue('brand_name');   });
                    $sheet->cell('E1', function($cell) {$cell->setValue('kat_activity_id');   });
                    $sheet->cell('F1', function($cell) {$cell->setValue('kategory_name');   });
                    $sheet->cell('G1', function($cell) {$cell->setValue('region_id');   });
                    $sheet->cell('H1', function($cell) {$cell->setValue('region');   });
                    $sheet->cell('I1', function($cell) {$cell->setValue('mt_account_id');   });
                    $sheet->cell('J1', function($cell) {$cell->setValue('account_name');   });
                    $sheet->cell('K1', function($cell) {$cell->setValue('budget_amount');   });
                    $sheet->cells('A1:K1', function($cells) {
                        $cells->setFontWeight('bold');
                        $cells->setBackground('#DB9795');
                    });
                    if (!empty($data)) {
                            $i = 1;
			    $no = 1;	
                        foreach ($data as $key => $value) {
                            $i = $i+1;
                            $sheet->cell('A'.$i, $no); 
                            $sheet->cell('B'.$i, $value->brand_id); 
                            $sheet->cell('C'.$i, $value->brand_code); 
                            $sheet->cell('D'.$i, $value->brand_name); 
                            $sheet->cell('E'.$i, $value->kat_activity_id); 
                            $sheet->cell('F'.$i, $value->kategory_name);  
                            $sheet->cell('G'.$i, $value->region_id); 
                            $sheet->cell('H'.$i, $value->region); 
                            $sheet->cell('I'.$i, $value->mt_account_id); 
                            $sheet->cell('J'.$i, $value->account_name); 
                            $sheet->cell('K'.$i, '0'); 
                            $no=$no+1;
                        }
                    }
            });
        })->download('xlsx');

    }

     public  function DownloadBudgetSEI() {


        $data = DB::table('budget_detail_excel_v')->where('company_code','=','MM2')->get()->toArray();

        return Excel::create('budget_template_SEI',function($excel) use ($data) {
            $excel->sheet('budget', function($sheet) use ($data)
             {
                    $sheet->cell('A1', function($cell) {$cell->setValue('No.');   });
                    $sheet->cell('B1', function($cell) {$cell->setValue('brand_id');   });
                    $sheet->cell('C1', function($cell) {$cell->setValue('brand_code');   });
                    $sheet->cell('D1', function($cell) {$cell->setValue('brand_name');   });
                    $sheet->cell('E1', function($cell) {$cell->setValue('kat_activity_id');   });
                    $sheet->cell('F1', function($cell) {$cell->setValue('kategory_name');   });
                    $sheet->cell('G1', function($cell) {$cell->setValue('region_id');   });
                    $sheet->cell('H1', function($cell) {$cell->setValue('region');   });
                    $sheet->cell('I1', function($cell) {$cell->setValue('mt_account_id');   });
                    $sheet->cell('J1', function($cell) {$cell->setValue('account_name');   });
                    $sheet->cell('K1', function($cell) {$cell->setValue('budget_amount');   });
                    $sheet->cells('A1:K1', function($cells) {
                        $cells->setFontWeight('bold');
                        $cells->setBackground('#DB9795');
                    });
                    if (!empty($data)) {
                            $i = 1;
                            $no = 1;
                        foreach ($data as $key => $value) {
                            $i = $i+1;
                            
                            $sheet->cell('A'.$i, $no); 
                            $sheet->cell('B'.$i, $value->brand_id); 
                            $sheet->cell('C'.$i, $value->brand_code); 
                            $sheet->cell('D'.$i, $value->brand_name); 
                            $sheet->cell('E'.$i, $value->kat_activity_id); 
                            $sheet->cell('F'.$i, $value->kategory_name);  
                            $sheet->cell('G'.$i, $value->region_id); 
                            $sheet->cell('H'.$i, $value->region); 
                            $sheet->cell('I'.$i, $value->mt_account_id); 
                            $sheet->cell('J'.$i, $value->account_name); 
                            $sheet->cell('K'.$i, '0'); 
                            $no=$no+1;
                        }
                    }
            });
        })->download('xlsx');

    }

    public function ImportBudget(Request $request) {
    	
    	$x = 0;
    	$total_budget = 0;


    	//clear Session
        Session::forget('budget_detail');
        Session::forget('budget_master');
        Session::forget('ErrorExcel');	
        //end Clear Session

        $budget_detail=[];
        $budget_master=[];
        $company_name='';


        if($request->hasFile('import_file')) {
        	$path = $request->file('import_file')->getRealPath(); 
            $data = Excel::load($path, function($reader) {
                    $reader->ignoreEmpty();
                    $results = $reader->get()->toArray();
            })->get();

            //dd($data);

            $company = DB::table('mtl_company')->where('id','=',$request->company_id)->first();

            $company_name = $company->company_name;
			
	        $company_id = $request->company_id;

            $budget_year = $request->year;
            
            //ceck apa sudah ada di database budget yg akan di input
            $uda_ada = DB::table('mtl_budget')->where('company_id' , '=', $request->company_id)->where('budget_year','=',$request->budget_year)->get();
	
	    //dd($request->year);	
            if (!isset($uda_ada)) {
                 $messages = array('Err' => 'Data Budget Tahun ' . $budget_year .' untuk PT. ' . $company_name . ' sudah ada di database' );
                 $MsgErr[] = ($messages);
            }
 

            if(!empty($data) && $data->count()){
            	//get data using foreach 
                foreach ($data as $key => $value){
                		//brand_id
						//dd($value['brand_id']);
						$MsgErr= [];
                		if (isset($value['brand_id'])) {
                             print_r($value['brand_id']);
                		     $input = array('brand_id' => $value['brand_id']);
                		     $rules = ['brand_id' => 'required|numeric|exists:mtl_brand_produk,id'];                		
                		     $rule_messages = array( 'numeric' => 'type brand id harus numeric',
                		                		'exists'  => 'brand ID tidak ada di master brand product, Upload Template Input budget untuk  brand id yang benar. ');
							
                		    $validation = Validator::make($input, $rules, $rule_messages);
                		    if($validation->fails()) {
                                dd('failed');
                                $failedRules = $validator->failed();
                                if(isset($failedRules['brand_id']['numeric'])) {
                                    $messages = array('Err' => 'Brand ID harus numeric');
                                }
                                if(isset($failedRules['brand_id']['exists'])) {
                                    $messages = array('Err' => 'Brand ID ' . $value['brand_id'] . ' Untuk Kode Brand ' . $value['brand_id'] . 'tidak ada di database ');
                                } 
                		    	$MsgErr[] = ($messages);
							 } else {
                		     	$brand_id = $value['brand_id']; 
                		     }
                		} else {
                			$messages = ['Err' => 'brand_id tidak boleh kosong'];
                			$MsgErr[] = ($messages);	
                		}
                		//Category Activity ID
                		if (isset($value['kat_activity_id'])) {
                			$input = array('cat_activity_id' => $value['kat_activity_id']);
                			$rules = ['cat_activity_id' => 'numeric|exists:mtl_kategory_activity,id'];
                		
                		    $rule_messages = array('numeric' => 'Kategory Activity harus numeric',
                		                	  'exists'  => 'Kategory Activity tidak ada di master Kategory Activity, Upload Template Input budget untuk  Kategory Activity yang benar. ');
							
                		    $validation = Validator::make($input, $rules, $rule_messages);
                		    if($validation->fails()) {
                		    	$failedRules = $validator->failed();
                                if(isset($failedRules['cat_activity_id']['numeric'])) {
                                    $messages = array('Err' => 'Kategory Activity  ID harus numeric');
                                }
                                if(isset($failedRules['cat_activity_id']['exists'])) {
                                    $messages = array('Err' => 'Kategory Activity ID ' . $value['kat_activity_id'] . ' Untuk Kategory Activity  ' . $value['kategory_name'] . 'tidak ada di database ');
                                } 
                                $MsgErr[] = ($messages);
							} else {
                		     	$cat_activity_id = $value['kat_activity_id']; 
                		    }

                		} else {
                			$messages = ['Err' => 'Kategory Activity tidak boleh kosong'];
                			$MsgErr[] = ($messages);
                		}
                		//Category Region ID
                		if (isset($value['region_id'])) {
                			$input = array('region_id' => $value['region_id']);
                			$rules = ['region_id' => 'required|numeric|exists:mtl_region,id'];
                		
                		    $rule_messages = array('required' => 'Region ID tidak boleh kosong',
                		                	  'numeric' => 'Region ID harus numeric',
                		                	  'exists'  => 'Region ID tidak ada di master Kategory Activity, Upload Template Input budget untuk Region ID yang benar. ');
                		
                		    $validation = Validator::make($input, $rules, $messages);
                		    if($validation->fails()) {
                		    	$failedRules = $validator->failed();
                                if(isset($failedRules['region_id']['numeric'])) {
                                    $messages = array('Err' => 'Region ID harus numeric');
                                }
                                if(isset($failedRules['region_id']['exists'])) {
                                    $messages = array('Err' => 'Region ID  ' . $value['region_id'] . ' Untuk Region ' . $value['region'] . 'tidak ada di database ');
                                } 
                                $MsgErr[] = ($messages);
							} else {
                		     	$region_id = $value['region_id']; 
                		    }
                		}  

                		if (isset($value['mt_account_id'])) {
                			$input = array('mt_account_id' => $value['mt_account_id']);
                			$rules = ['mt_account_id' => 'required|numeric|exists:mtl_mt_channel,id'];
                		
                		    $rule_messages = array('required' => 'Account ID tidak boleh kosong',
                		                	  'numeric' => 'Account ID harus numeric',
                		                	  'exists'  => 'Account ID tidak ada di master MT Account, Upload Template Input budget untuk Account ID yang benar. ');
                		
                		    $validation = Validator::make($input, $rules, $messages);
                		    if($validation->fails()) {
                		    	$failedRules = $validator->failed();
                                if(isset($failedRules['mt_account_id']['numeric'])) {
                                    $messages = array('Err' => 'Account ID harus numeric');
                                }
                                if(isset($failedRules['mt_account_id']['exists'])) {
                                    $messages = array('Err' => 'Account ID  ' . $value['mt_account_id'] . ' Untuk Region ' . $value['account_name'] . 'tidak ada di database ');
                                } 
                                $MsgErr[] = ($messages);
							} else {
                		     	$region_id = $value['mt_account_id']; 
                		    }
                		}  
                	
                		if (isset($value['budget_amount'])) {
                			$input = array('budget_amount' => $value['budget_amount']);
                			$rules = ['budget_amount' => 'required|numeric'];
                		
                		    $rule_messages = array('required' => 'Amount Budget tidak boleh kosong, Input 0 jika tidak ada budget di tahun input budget',
                		                	  'numeric' => 'Amount Budget harus numeric');
                		                	  
                		    $validation = Validator::make($input, $rules, $rule_messages);
                		    if($validation->fails()) {
                		    	$failedRules = $validator->failed();
                                if(isset($failedRules['budget_amount']['numeric'])) {
                                    $messages = array('Err' => 'Amount Budget tidak boleh kosong, Input 0 jika tidak ada budget di tahun input budget');
                                }
                                $MsgErr[] = ($messages);
							} else {
                		     	$budget_amount = $value['budget_amount'];
                		     	$total_budget = $total_budget + $budget_amount; 
                		    }
                		} else {
                			$budget_amount = 0;
                		}

                		if (isset($value['brand_id'])) {
                			if (isset($value['mt_account_id']) and !isset($value['region_id'])){
                			        $budget_detail[] = [
                			        	'cat_activity_id' => $value['kat_activity_id'],
                			        	'activity' => $value['kategory_name'],
                			            'brand_id' => $value['brand_id'],
                			            'brand_code' => $value['brand_name'],
                			            'brand_name' => $value['brand_name'],
                			            'mt_account_id' => $value['mt_account_id'],
                			            'account_name' => $value['account_name'],
                			            'region_id' => null,
                			            'region_name' => null,
                			            'budget_amount' => $value['budget_amount'],
                			            'created_by' => auth::id(),
                			            'updated_by' => auth::id()
                			];}

                			if (isset($value['region_id']) and !isset($value['mt_account_id'])){
                			        $budget_detail[] = [
                			        	'cat_activity_id' => $value['kat_activity_id'],
                			        	'activity' => $value['kategory_name'],
                			            'brand_id' => $value['brand_id'],
                			            'brand_code' => $value['brand_name'],
                			            'brand_name' => $value['brand_name'],                			            
                			            'mt_account_id' => null,
                			            'account_name' => null,                			            
                			            'region_id' => $value['region_id'],
                			            'region_name' => $value['region'],
                			            'budget_amount' => $value['budget_amount'],
                			            'created_by' => auth::id(),
                			            'updated_by' => auth::id()
                			];}

                			if (!isset($value['region_id']) and !isset($value['mt_account_id'])){
                			        $budget_detail[] = [
                			        	'cat_activity_id' => $value['kat_activity_id'],
                			        	'activity' => $value['kategory_name'],
                			            'brand_id' => $value['brand_id'],
                			            'brand_code' => $value['brand_name'],
                			            'brand_name' => $value['brand_name'],
                			            'mt_account_id' => null,
                			            'account_name' => null,
                			            'region_id' => null,
                			            'region_name' => null,
                			            'budget_amount' => $value['budget_amount'],
                			            'created_by' => auth::id(),
                			            'updated_by' => auth::id()
                			];}
                		}
                }

 
             	$budget_master[] = [
             							'budget_year' => $budget_year,
             							'total_budget' => $total_budget,
             							'company_id' => $company_id,
             							'created_by' => auth::id(),
             							'updated_by' => auth::id()
             					   ];   

  				Session::put('budget_detail', $budget_detail);
		        Session::put('budget_master', $budget_master);
		        if (!empty($MsgErr)) {
		        		        Session::put('ErrorExcel',$MsgErr );}           					   
            }

            $yearNow  = Carbon\Carbon::now()->year;
            $year5  = Carbon\Carbon::now()->addyear(5)->year;

            return view('budget.budget_sentralisasi', compact('company_name','yearNow','year5'));
        }


    } 

    public function Save_Budget(Request $request) {

    	$budget_detail = Session::get('budget_detail');
        $budget_master = Session::get('budget_master'); 

        $save_mst_budget = []; 
        $budget_header_id = DB::select("select nextval('mtl_budget_id_seq') as header_id");

        foreach($budget_header_id as  $value) {
            $id = $value->header_id;
        }

        //dd($budget_master);
        foreach($budget_master as $value) {
        	$budget_year = $value['budget_year'];
        	$company_id = $value['company_id'];
        	$total_budget = $value['total_budget'];
        }

        $save_mst_budget = [
        	'id' => $id,
        	'budget_year' => $budget_year,
        	'company_id' => $company_id,
        	'total_budget' => $total_budget,
        	'created_by' => Auth::user()->id,
        	'updated_by' => Auth::user()->id
        ];

        DB::begintransaction(); 

        DB::table('mtl_budget')->insert(array($save_mst_budget));

        $save_detail[]='';

        //Save Order Detail
        $i=1;
        foreach ($budget_detail as $value) {

            $save_detail = [
             'budget_hdr_id' => $id,
             'cat_activity_id' => $value['cat_activity_id'],
             'brand_id' => $value['brand_id'],
             'mt_account_id' => $value['mt_account_id'],
             'region_id' => $value['region_id'], 
             'budget_amount' => $value['budget_amount'],
             'created_by' => Auth::user()->id,
             'updated_by' => Auth::user()->id];
             
             DB::table('mtl_budget_str_detail')->insert(array($save_detail));

             $i=$i+1;
             $save_detail[] ="";
        }

        DB::commit();

        $Success = "Budget Tahun" . $budget_year . 'berhasil di Simpan!';


        Session::forget('budget_detail');
        Session::forget('budget_master'); 
        Session::forget('ErrorExcel');

		$yearNow  = Carbon\Carbon::now()->year;
        $year5  = Carbon\Carbon::now()->addyear(5)->year;
		
		$company =  Session::Get('user_company');
		
        return view('budget.upload_budget_str', compact('company', 'yearNow', 'year5')); 

    }
}
