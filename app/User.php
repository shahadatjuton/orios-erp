<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //    =================***************====================
        public function role(){
            return $this->belongsTo('App\Role');
        }

        public function leaves(){
            return $this->hasMany('App\Leave');
        }

        public function presents(){
            return $this->hasMany('App\Present');
        }

        public function job(){
            return $this->belongsTo('App\Job');
        }

    public function interViewInvitation(){
        return $this->belongsTo('App\interviewInvitation');
    }

    public function applications(){
        return $this->hasMany('App\Application');
    }


}
