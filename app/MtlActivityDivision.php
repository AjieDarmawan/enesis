<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MtlActivityDivision extends Model
{
   
       protected $table = 'mtl_activity_division';

   	protected $fillable = [
   					'activity_id',
   					'division_id',
   					'active',
   				    'created_by',
   					'updated_by'
   					]; 
}
