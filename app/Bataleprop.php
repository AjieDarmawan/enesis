<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bataleprop extends Model
{
    //protected $table = 'trx_prop_bataleprop';
    // protected $table = 'trx_prop_settlement';

    //protected $table = 'eprop_detail_budget_v';
    protected $table = 'trx_prop_bataleprop';
	//protected $table1 = 'trx_det_prop_budgetbreak';
   	protected $fillable = [
	  'eprop_id ',
	  'eprop_no ',
	  'budget_detail_id ',
	  'status',
	  'area_id',
	  'area',
   	  'reason ',
	  'created_by',
	  'updated_by' 	
	];

}
