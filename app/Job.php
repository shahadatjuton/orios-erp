<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $dates = [
        'circular',
        'deadline',
        // your other new column
    ];

//    protected $fillable = [
//        'designation_id',
//    ];

    public function department(){
        return $this->belongsTo('App\Department');
    }

    public function designation(){
        return $this->belongsTo('App\Designation');
    }

    public function users(){
        return $this->hasMany('App\User');
    }

    public function applications(){
        return $this->hasMany('App\Application');
    }
}
