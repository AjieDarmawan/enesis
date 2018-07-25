<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mtldivision extends Model
{
	protected $table = 'mtl_division';
    protected $fillable = [
    	'division_code',    	
    	'division_name',  
    	'active',  
    	'created_by',
    	'updated_by'
    	];
}

