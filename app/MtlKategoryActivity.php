<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class MtlKategoryActivity extends Model
{
   protected $table = 'mtl_kategory_activity';

   	protected $fillable = [
   					'group_id',
   					'kategory_name',
   					'created_by',
   					'updated_by',
   					'active'
   					]; 
}
