<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class MtlBudgetDstrArea extends Model
{
    //protected $table = 'mtl_persons_area';
    //protected $fillable = [
    //			'id',
    //			'person_id',
    //			'area_id',
    //			'updated_by',
    //			'created_by'

    protected $table = 'mtl_budget_dst_asdh';
    protected $fillable = [
    			'budget_dst_id',
    			'monthyear',
    			'asdh_id',
    			'area_id',
                'budget_amount',                
    			'created_by',
    			'updated_by'    		
    			];
}
