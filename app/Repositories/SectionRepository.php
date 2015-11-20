<?php


namespace App\Repositories;

use App\Section;


class SectionRepository
{


    public function __construct(Section $model)
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