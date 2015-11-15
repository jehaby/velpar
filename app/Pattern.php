<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pattern extends Model
{

    public function sections($user_id = null)
    {
        if (! $user_id) {
            return $this->hasMany('App\Section');
        }


    }

}
