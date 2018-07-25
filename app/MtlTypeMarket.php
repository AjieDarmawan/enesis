<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class MtlTypeMarket extends Model
{
 
  	protected $table = 'mtl_type_market';

   	protected $fillable = [
   					'type_market_code',
   					'description',
   					'active',	
   					'created_by',
   					'updated_by'
   					];

}
