<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class FndValue extends Model
{
   public function users()
    {
        return $this->belongsToMany(Voyager::modelClass('User'), 'posiiton');
    }  
}
