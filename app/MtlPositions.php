<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class MtlPositions extends Model
{
    protected $table = 'mtl_positions';

   	protected $fillable = [
   					'position_name`',
   					'active',
   					'created_by',
   					'updated_by'
   					];
}