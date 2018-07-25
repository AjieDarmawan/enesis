<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class BudgetStrDtlView extends Model
{
   	protected $table = 'budget_str_detail_view';

      protected $fillable = [
                  'budget_hdr_id',
                  'cat_activity_id',
                  'brand_id',
                  'mt_account_id',
                  'budget_amount',
                  'created_at',
                  'updated_at',
                  'created_by',
                  'updated_by',
                  'region_id',
                  'budget_year',
                  'total_budget',
                  'company_name',
                  'kategory_name',
                  'brand_code',
                  'region',
                  'account_name',
                  'budget_type'
                  ];
}
