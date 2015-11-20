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

        // get user by id
    }


    public function prefixes()
    {
        return $this->hasMany('App\Prefix');
    }


    public function users()
    {
        return $this->hasMany('App\User');
    }

}
