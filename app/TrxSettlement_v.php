<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrxSettlement_v extends Model
{
              //
    protected $table = 'eprop_detail_budget_v';

   	protected $fillable = [
    'budget_detail_id',
   	'header_id',
    'budget_year',
    'reco_no',
    'eprop_no',
    'start_date',
    'end_date',
    'description',
    'execute_status',
    'company_id',
    'company_nama',
    'company_code',
    'division_name',
    'area_id',
    'region_id',
    'area',
    'region',
    'subregion',
    'brand_code',
    'brand_name',
    'produk_sub_type',
    'brand_id',
    'kategory_id',
    'activity_id',
    'activity_name',
    'produk_id',
    'kategory_name',
    'produk_name',
    'account_id',
    'account_name',
    'row_number',
    'budget_amount',
    'person_id',
    'person_name',
    'position_id',
    'position_name',
    'tsubregion_id',
    'background',
    'objective',
    'estimate_cost_desc',
    'mechanism',
    'kpi',
    'eprop_apprv_status'
];
}
