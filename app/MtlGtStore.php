<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class MtlGtStore extends Model
{

  	protected $table = 'mtl_gt_store';

   	protected $fillable = [
   					'cust_ship_id',
   					'customer_number',
   					'store_name',
   					'alamat',
   					'alamat2',
   					'alamat3',
   					'alamat4',
   					'kota',
   					'propinsi',	
   					'created_by',
   					'updated_by',
   					'active',
   					'type_market_code'
   					];
    
}
