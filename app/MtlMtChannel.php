<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class MtlMtChannel extends Model
{
  	protected $table = 'mtl_mt_channel';

   	protected $fillable = [
   					'channel_name',
   					'type_market_code',
   					'active',	
   					'created_by',
   					'updated_by'
   					];
}
