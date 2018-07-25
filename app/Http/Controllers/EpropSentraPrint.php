<?php

namespace App\Http\Controllers;

use Illuminate\Support\MessageBag;
use Illuminate\Http\Request; 
use Response;
use Validator;
use Carbon;
use Session;
use Illuminate\Support\Facades\Input;
use Excel;
use Auth;
use DB;

class EpropSentraPrint extends Controller
{
	/**
    * Return View file
    * @var array
    */

   public function PrintSentra($header_id)
   {

    $Print = DB::table('eprop_info_view')->where('header_id',$header_id)->get();   
    return view('eprop_rpt/index', ['Print' => $Print]);
   }


   
}