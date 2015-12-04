<?php

namespace App;



class Prefix extends BaseModel
{

    public $timestamps = false;


    public $fillable = ['id', 'title'];


    public function patterns()
    {
        return $this->belongsToMany('App\Pattern');
    }


}
