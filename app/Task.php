<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected function user(){
        return $this->belongsToMany('App\User');
    }

}
