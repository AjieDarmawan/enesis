<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class BrandProdView extends Model
{
   	protected $table = 'brand_produk_view';

   	protected $fillable = [
   					'company_id',
   					'brand_code',
   					'brand_name',
   					'product_type',
   					'created_by',
   					'updated_by',
   					'active',
   					'company_code',
   					'company_name'
   					];

}
