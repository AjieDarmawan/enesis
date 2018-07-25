<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bataleprop1 extends Model
{
    //protected $table = 'trx_prop_bataleprop';
    //protected $table = 'trx_prop_bataleprop';
	protected $table = 'trx_det_prop_budgetbreak';
   	protected $fillable = [
	 //'execute_status',	
	 // 'created_by',
	 // 'updated_by'
	  'eprop_id ',
	  'eprop_no ',
	  'budget_detail_id ',
	  'status',
	  'area_id',
	  'area',
   	  'reason ',
   	  'execute_status',
	  'created_by',
	  'updated_by' 	 	
	];

}
