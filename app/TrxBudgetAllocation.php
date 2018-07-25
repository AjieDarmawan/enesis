<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class TrxBudgetAllocation extends Model
{
    protected $table = 'trx_budget_allocation';

       	protected $fillable = [
					'budget_det_id',
					'allocation_date',
					'allocation_type',
					'from_brand_id',
					'from_cat_act_id',
					'begining_budget',
					'ending_budget',
					'submit_allocation',
					'to_brand_id',
					'to_cat_act_id',
					'allocation',
					'status_approve',
					'created_at',
					'updated_at',
					'created_by',
   					'updated_by'
   					];  
}
