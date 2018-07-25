	<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class MtlHirarki extends Model
{
   protected $table = 'mtl_hirarki';

	protected $fillable = [ 
				'hirarki_name',
				'hirarki_type',
				'division_id',
				'brand_id',
				'status_aktif',
				'activate_date',
				'created_by',
				'updated_by'
    			];
}
