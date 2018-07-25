<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


//class MtlPerson extends Model

class MtlBudgetDstr extends Model
{
    //protected $table = 'mtl_persons';
	protected $table = 'mtl_budget_dst_asdh';
    protected $fillable = [
    			'budget_dst_id',
                'month',
                'year',
    			'monthyear',
    			'asdh_id',
    			'area_id',
                'budget_amount',                
    			'created_by',
    			'updated_by'
    			];
}
