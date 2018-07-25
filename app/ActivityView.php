<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ActivityView extends Model
{
   
   protected $table = 'activity_view';

   	protected $fillable = [
   					'area',
   					'group_id',
   					'kategory_id',
   					'activity_name',   					
   					'kategory_name',
                  'group_name',
                  'active'			
   					]; 
}