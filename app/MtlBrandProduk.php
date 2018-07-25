<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class MtlBrandProduk extends Model
{
   	protected $table = 'mtl_brand_produk';

   	protected $fillable = [
   					'company_id',
   					'brand_code',
   					'brand_name',
   					'product_type',
   					'created_by',
   					'updated_by',
   					'active'
   					];

}
