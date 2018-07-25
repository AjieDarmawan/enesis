<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class poslimitview extends Model
{
   
   protected $table = 'pos_limit_view';

   	protected $fillable = [
   					'position_name',
   					'division_name',
   					'description',
   					'keterangan'				
   					]; 
}