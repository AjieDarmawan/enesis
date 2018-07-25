<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class MtlGroupActivity extends Model
{
	protected $table = 'mtl_group_activity';

	protected $fillable = [ 
				'group_name',
				'created_by',
				'updated_by'
    			];

}