<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    public function leaves(){
        return $this->hasMany('App\Leave');
    }
}
