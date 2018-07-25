<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class VProdukView extends Model
{
    protected $table = 'vproduk_view';

   	protected $fillable = [
   					'inventory_item_id',
   					'brand_id',
   					'produk_name',
   					'created_by',
   					'updated_by',
   					'active',
   					'brand_code',
   					'brand_name'   					
   					]; 
}
