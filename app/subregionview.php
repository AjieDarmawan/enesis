<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class subregionview extends Model
{
   
   protected $table = 'region_sub_view';

   	protected $fillable = [
   					'subregion',
   					'id_region',
   					'region',   					
   					'created_at',
				    'updated_at',  					
   					'created_by',
   					'updated_by',
   					'active'  					
   					]; 
}