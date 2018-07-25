<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class MtlCompany extends Model
{
   
   	protected $table = 'mtl_company';

   	protected $fillable = [
   					'company_code',
   					'company_name',
   					'active',
   					'created_by',
   					'updated_by'
   					]; 
}
