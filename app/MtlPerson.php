<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class MtlPerson extends Model
{
    protected $table = 'mtl_persons';

    protected $fillable = [
    			'name',
    			'position_id',
    			'region_id',
    			'status',
    			'created_by',
    			'updated_by'
    			];
}
