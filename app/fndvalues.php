<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class fndvalues extends Model
{
    protected $table = 'fnd_values';

    protected $fillable = [
         'group_value',
        'value_name',       
        'value_attribute1',
        'value_attribute2',
        'value_attribute3',
      'start_active_date',
      'end_active_date',
        ' created_at',
        'updated_at',
        'active',
        'created_by',
        'updated_by',
        'value_group_name'
                ];
}


