<?php


namespace App\Repositories;

use App\Prefix;
use Illuminate\Support\Collection;


class PrefixRepository
{


    public function __construct(Prefix $model)
    {
        $this->model = $model;
    }


    /**
     *
     * @return Collection
     */
    public function getByIds(array $ids)
    {

        return $this->model->whereIn('id', $ids)->get();

    }



}