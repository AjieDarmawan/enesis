<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class MtlActivity extends Model
{
     	protected $table = 'mtl_activity';

   	protected $fillable = [
   					'group_id',
   					'kategory_id',
   					'activity_name',
   					'active',
   					'created_by',
   					'updated_by'
   					]; 
}
