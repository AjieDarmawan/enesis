<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class MtlProduk extends Model
{
    protected $table = 'mtl_produk';

   	protected $fillable = [
   					'inventory_item_id',
   					'brand_id',
   					'produk_name',
   					'created_by',
   					'updated_by',
   					'active'
   					]; 
}
