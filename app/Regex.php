<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regex extends Model
{

    public $fillable = ['text'];


    public function patterns()
    {
        return $this->hasMany('App\Pattern');
    }


}
