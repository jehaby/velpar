<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{


    public function scopeRandom($query)
    {
        $totalRows = static::count() - 1;
        $skip = $totalRows > 0 ? mt_rand(0, $totalRows) : 0;

        return  $query->skip($skip)->take(1);
    }


}