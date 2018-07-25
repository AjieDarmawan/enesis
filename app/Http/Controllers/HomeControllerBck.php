<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;

class HomeControllerBck extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
	 
    public function index()
    {

        $userid = auth::user()->id;        
        $user_info = DB::table('user_info')->where('id', '=', $userid)->get();
        $user_access_info = DB::table('user_access_info_v')->where('user_id', '=',$userid)->get(); 
        $user_company = DB::table('user_access_info_v')->where('user_id', '=',$userid)->where('access_key', 'COMPANY')->get();
        $user_brand = DB::table('user_access_info_v')->where('user_id', '=',$userid)->where('access_key', 'BRAND')->get();
        $user_kat_act = DB::table('user_access_info_v')->where('user_id', '=',$userid)->where('access_key', 'DISTRIBUTOR')->get();
        $user_market_type = DB::table('user_access_info_v')->where('user_id', '=',$userid)->where('access_key', 'MARKET TYPE')->get();
        $user_division = DB::table('user_access_info_v')->where('user_id', '=',$userid)->where('access_key', 'DIVISION')->get();        
        $customer_info = DB::table('customer_info')->wherein('cust_ship_id',function($query){
            $query->select('cust_ship_id')->from('user_access_info_v')
            ->where('user_id',auth::user()->id);
        })->get();  
 
 
        foreach ($user_info as $key => $value) {
            $user_role = $value->role_descr;
        }

        if ($user_role == 'user_admin_menu') {
            //
        }
        $minFleetType = DB::table('fnd_values')->where('group_value','Min_MOQ_Fleet')->get(); 
        $minFleetVal = DB::table('fnd_values')->where('group_value','Min_MOQ_Value')->get(); 
        $minFleetCrt = DB::table('fnd_values')->where('group_value','Min_MOQ_Carton')->get(); 

        Session::put('user_info',$user_info);
        Session::put('customer_info',$customer_info);
        Session::put('user_company',$user_company);
        Session::put('user_brand',$user_brand);
        Session::put('user_kat_act',$user_kat_act);
        Session::put('user_market_type',$user_market_type);
        Session::put('user_division',$user_division);
        Session::put('minFleetCrt',$minFleetCrt);
        Session::put('minFleetVal',$minFleetVal);
        Session::put('minFleetType',$minFleetType);
		
        return view('dashboard.sales_graph');
    }	 
	 
    public function index_OLD4Apr19()
    {
        $user_info = DB::table('user_info')->where('id', auth::user()->id)->get();
        $customer_info = DB::table('customer_info')->wherein('cust_ship_id',function($query){
            $query->select('cust_ship_id')->from('user_info')
            ->where('id',auth::user()->id);
        })->get();  

        foreach ($user_info as $key => $value) {
            $user_role = $value->role_descr;
        }

        if ($user_role == 'user_admin_menu') {
            //
        }
        $minFleetType = DB::table('fnd_values')->where('group_value','Min_MOQ_Fleet')->get(); 
        $minFleetVal = DB::table('fnd_values')->where('group_value','Min_MOQ_Value')->get(); 
        $minFleetCrt = DB::table('fnd_values')->where('group_value','Min_MOQ_Carton')->get(); 

        Session::put('user_info',$user_info);
        Session::put('customer_info',$customer_info);
        Session::put('minFleetCrt',$minFleetCrt);
        Session::put('minFleetVal',$minFleetVal);
        Session::put('minFleetType',$minFleetType);

        return view('dashboard.sales_graph');
    }
}
