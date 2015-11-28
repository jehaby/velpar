<?php


namespace App\Repositories;

use App\Section;
use App\Exceptions\WrongSectionIdException;
use Illuminate\Support\Collection;


class SectionRepository
{


    public function __construct(Section $model)
    {
        $this->model = $model;
    }


    /**
     *
     * @return Collection
     */
    public function getByIds(array $ids)
    {

        $res = $this->model->whereIn('id', $ids)->get();

        if (count($res) != count($ids)) {
            throw new WrongSectionIdException;
        }

        return $res;

    }

}