<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    public function jobs(){
        return $this->hasMany('App\Job');
    }
    public function users(){
        return $this->hasMany('App\User');
    }
}
