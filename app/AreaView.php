<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class AreaView extends Model
{
   
   protected $table = 'area_view';

   	protected $fillable = [
   					'area',
   					'id_subregion',
   					'id_region',
   					'region',   					
   					'subregion',
				    'created_at',
				    'updated_at',  					
   					'created_by',
   					'updated_by',
   					'active'  					
   					]; 
}