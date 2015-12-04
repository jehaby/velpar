<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends BaseModel
{

    public $timestamps = false;


    public $fillable = ['id', 'title'];


    public function patterns()
    {
        return $this->belongsToMany('App\Pattern');
    }


}
