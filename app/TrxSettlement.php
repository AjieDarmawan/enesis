<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrxSettlement extends Model
{
          //
    protected $table = 'trx_prop_settlement';

   	protected $fillable = [
   	  'budget_amount ',
	  'actual_amount',
	  'eprop_id ',
	  'budget_detail_id ',
	  'status',
	  'created_by',
	  'updated_by' 
];

}
