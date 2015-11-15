<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{

    public $timestamps = false;


    public function patterns()
    {
        return $this->hasMany('App\Pattern');
    }


}
