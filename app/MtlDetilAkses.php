<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class MtlDetilAkses extends Model
{
    protected $table = 'mtl_det_akses';

    protected $fillable = [
    			'id',
    			'group_id',
    			'akses_key',
    			'akses_id',
    			'akses_name',
    			'full_akses_flag',
    			'flag_executor',
                'flag_originator',
                'flag_approver',
    			'updated_by',
    			'created_by'
    			];
}

