<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Society extends Model
{
    protected $fillable = ['sname', 'address', 'smanager', 'is_approved'];


    protected $table = 'societies';

    public function owner(){
        return $this->hasOne('App\Owner');
    }
}
