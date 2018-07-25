<?php

namespace App\Http\Controllers;

use Illuminate\Support\MessageBag;
use App\TrxEproposalStr;
use Response;
use Validator;
use Carbon;
use Session;
use Illuminate\Support\Facades\Input;
use Excel;
use Auth;
use DB;

use Illuminate\Http\Request;

class SaveEpropController extends Controller
{
    public function SaveEprop(Request $request) {

    	$request->all();

    	

    	$FirstPage = Session::get('FirstPageSentra');
    	$SecondPage = Session::get('SndPageSentra');

    	$Merge = $FirstPage + $SecondPage;

    	foreach ($FirstPage as $key => $value) {
    				$Merge=$value;
    			}		
    	
    	foreach ($SecondPage as $key => $value) {
    				$Merge2 =$value;
    			}		

    	$EpropData = $Merge+($Merge2);

    	//setup hirarki No.

    	$company_code= DB::table('mtl_company')->where('id', $EpropData['company_id'])->select('company_code')->first();
    	$company_code= DB::table('mtl_division')->where('id', $EpropData['division_id'])->select('division_code')->first();
    	$bln = $EpropData['start_date']->format('M');
    	$year = $EpropData['budget_year'];

    	//Get Eprop No First

    	/*$EpropNo = DB::table('trx_proposal_mst')->select('1')
    											->where('company_id', '=', $EpropData['company_id'])
    											->where('division_id', '=', $EpropData['division_id'])
    											->where('budget_year', '=', $EpropData['budget_year'])
    											->groupBy('company_id')->groupBy('division_id')->groupBy('budget_year')->get();
		*/

    	//if (!isset($EpropNo)) {
    		$num =1;
    		$EpropNo =  sprintf("%05d", $num);
    	//}

    	dd($EpropNo);


    	$counter =
    	$EpropNo = '';
    	//Save Into TrxEprop

    	$Eprop = New TrxEproposalStr;
		$Eprop->eprop_no	= $EpropNo;
		$Eprop->reco_no	= $EpropData['reco_no'];
		$Eprop->budget_year	= $EpropData['budget_year'];
		$Eprop->company_id	= $EpropData['company_id'];
		$Eprop->division_id	= $EpropData['division_id'];
		$Eprop->market_type_id	= $EpropData['market_type_id'];
		$Eprop->start_date	= $EpropData['start_date']->format('Y-m-d');;
		$Eprop->end_date	= $EpropData['end_date']->format('Y-m-d');;
		$Eprop->originator_id	= $EpropData['originator'];
		$Eprop->description	= $EpropData['description'];
		$Eprop->background	= $EpropData['background'];
		$Eprop->objective	= $EpropData['objective'];
		$Eprop->mechanism	= $EpropData['mechanism'];
		$Eprop->estimate_cost_desc	= $EpropData['estimate_cost_desc'];
		$Eprop->kpi	= $EpropData['kpi'];
		$Eprop->total_cost	= $EpropData['total_cost'];
		//$Eprop->use_target_sales_flag	= $EpropData['use_target_sales_flag'];
		$Eprop->avg_sales_3month	= $request->avgSales;
		$Eprop->target_sales	= $request->targetSales;
		$Eprop->growth	= $request->value_sales;
		$Eprop->cost_ratio	= $request->CostValue;
		//$Eprop->hirarki_id	= $EpropData['hirarki_id'];
		$Eprop->apprv_status	= 'Not Approve';
		$Eprop->created_by	= Auth::user()->id;
		$Eprop->updated_by	= Auth::user()->id;
    	$Eprop->save();
	
	

    	//dd($Merge, $Merge2, $mergeAll);
    /*
    	$budgetbreak   = Session::get('budget_breakdown') ;
        $budgetAmount = $request->budgetallocation;
        $row_number = $request->row_number;
        $combine_arr = array_combine($row_number, $budgetAmount);

        foreach ($budgetbreak as $key => $value) {
            foreach ($combine_arr as $bkey => $budget) {
                if ($value->row_number == $bkey) {
                    $value->budget_amount = $budget;
                }
            } 
        }

        dd($combine_arr, $request->all(),Session::get('budget_breakdown'));
	*/

    }

}
