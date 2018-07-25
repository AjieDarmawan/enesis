<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class MtlGroupHirarkiLimit extends Model
{
   protected $table = 'mtl_group_hirarki_limit';

   	protected $fillable = [
   					'description',
   					'amount_from',
   					'amount_to',
   					'created_by',
   					'updated_by',
   					'active'
   					]; 
}
