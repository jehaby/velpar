<?php


namespace App\Repositories;

use App\Prefix;


class PrefixRepository
{


    public function __construct(Prefix $model)
    {
        $this->model = $model;
    }


    /**
     *
     */
    public function getByIds(array $ids)
    {

        return $this->model->whereIn('id', $ids)->get();

    }



}