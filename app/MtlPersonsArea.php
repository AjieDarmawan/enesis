<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class MtlPersonsArea extends Model
{
    protected $table = 'mtl_persons_area';

    protected $fillable = [
    			'id',
    			'person_id',
    			'area_id',
    			'updated_by',
    			'created_by'
    			];
}
