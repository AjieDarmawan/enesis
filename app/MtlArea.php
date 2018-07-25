<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class MtlArea extends Model
{
   
   protected $table = 'mtl_area';

   	protected $fillable = [
   					'id_region',
   					'id_subregion',
   					'area',
   					'active',
   					'created_by',
   					'updated_by'
   					]; 
}
