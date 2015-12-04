<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regex extends BaseModel
{

    public $fillable = ['text'];


    public function patterns()
    {
        return $this->hasMany('App\Pattern');
    }

    
    public function __toString() {
        return (substr($this->text, 1, -3));
    }


}
