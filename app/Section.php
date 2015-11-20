<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{

    public $timestamps = false;


    public $fillable = ['id', 'title'];


    public function patterns()
    {
        return $this->belongsToMany('App\Pattern');
    }


}
