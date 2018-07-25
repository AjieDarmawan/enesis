<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MtlHirarkiPosLimit extends Model
{
    //
      protected $table = 'mtl_hirarki_pos_limit';

   	protected $fillable = [
   					'position_id',
   					'division_id',
   					'group_limit',
   					'description',
   					'created_by',
   					'updated_by'
   					]; 
}
