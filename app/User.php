<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','provider', 'provider_id', 'password','role_id','photo_id', 'is_active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public  function role(){
        return $this->belongsTo('App\Role');
    }

    public  function photo(){
        return $this->belongsTo('App\Photo');
    }


    public function isAdmin(){
        if($this->role->name == "administrator" && $this->is_active == 1)
            return true;
        else
            return false;

    }

    public function isManager(){
        if($this->role->name == "manager" && $this->is_active == 1)
            return true;
        else
            return false;

    }

    public function isOwner(){
        if($this->role->name == "owner" && $this->is_active == 1)
            return true;
        else
            return false;

    }

    public function isSecurity(){
        if($this->role->name == "security" && $this->is_active == 1)
            return true;
        else
            return false;

    }

}
