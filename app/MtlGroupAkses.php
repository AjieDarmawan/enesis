<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MtlGroupAkses extends Model
{
       protected $table = 'mtl_group_akses';

   	protected $fillable = [
   					'group_akses_code',
   					'group_akses_descr',
   					'active',
   				    'created_by',
   					'updated_by'
   					]; 
}
