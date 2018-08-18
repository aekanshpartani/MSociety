<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = ['name', 'owner_id', 'society_id',  'is_approved', 'phone_no', 'reason'];



    public function owner()
    {
        return $this->belongsTo('App\Owner');
    }
}
