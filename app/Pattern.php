<?php

namespace App;



class Pattern extends BaseModel
{

    protected $with = ['regex', 'sections', 'prefixes'];


    public function users()
    {
        return $this->belongsToMany('App\User', 'user_pattern');
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
