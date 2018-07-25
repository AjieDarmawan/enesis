<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class MtlFleet extends Model
{

	protected $table = 'mtl_fleet';
	
    protected $fillable = [
    			'fleet_code',
    			'fleet_descr',
    			'max_carton',
    			'tonese',
    			'kubikase',
    			'created_by',
    			'updated_by'
    			];
}
