<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $fillable = [
        'type_name',

    ];

    protected $dates = [
        'str_date',
        'end_date',
        ];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function leaveType(){
        return $this->belongsTo('App\LeaveType');
    }


}
