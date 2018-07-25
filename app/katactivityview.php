<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class katactivityview extends Model
{
   	protected $table = 'katactivityview';

   	protected $fillable = [
   					'group_id',
                  'kategory',
                  'budget_type',
                  'flag_region',
                  'flag_mt',
                  'created_by',
                  'updated_by',
                  'group_name',
                  'active'
   					];

}
