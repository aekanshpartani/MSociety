<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $fillable = ['user_id', 'society_id', 'phone_no'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function society()
    {
        return $this->belongsTo('App\Society');
    }
}
