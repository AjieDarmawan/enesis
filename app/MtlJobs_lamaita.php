<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class MtlJobs extends Model
{
    protected $table = 'mtl_jobs';

   	protected $fillable = [
   					'job_code',
   					'job_description',
   					'job_brand',
   					'job_type',
   					'active',
   					'created_by',
   					'updated_by'
   					];
}
