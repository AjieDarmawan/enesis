<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


//class MtlPerson extends Model

class MtlBudgetDstr_View extends Model
{
    //protected $table = 'mtl_persons';
    protected $table = 'budget_dstr_view';
    protected $fillable = [
                'budget_dst_id',
                'month',
                'year',                
                'area',
                'name',
                'budget_amount',                
                'created_by',
                'updated_by'
                ];
}
