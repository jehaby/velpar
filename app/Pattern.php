<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pattern extends Model
{


    public function users()
    {
        return $this->belongsToMany('App\User');
    }


    public function regex() {
        return $this->belongsTo('App\Regex');
    }


    public function sections()
    {
        return $this->belongsToMany('App\Section');
    }


    public function prefixes()
    {
        return $this->belongsToMany('App\Prefix');
    }


}
