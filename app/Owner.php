<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $fillable = ['user_id', 'society_id', 'flat_no', 'phone_no'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function society()
    {
        return $this->belongsTo('App\Society');
    }


    public function guest(){
        return $this->hasMany('App\Guest');
    }
}
