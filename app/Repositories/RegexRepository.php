<?php


namespace App\Repositories;

use App\Regex;


class RegexRepository
{

    /**
     * @var Regex
     */
    private $model;


    public function __construct(Regex $regex)
    {
        $this->model = $regex;
    }


    /**
     * @param string $text
     * @return Regex
     */
    public function findOrCreate($text)
    {
        return $this->model->firstOrCreate(['text' => $text]);
    }

    /**
     * @param $column
     * @param $value
     * @param array|null $related
     * @return mixed
     */
    public function getWhere($column, $value, array $related = null) // TODO: implement $related   do I need it?
    {
        return $this->model->where($column, $value)->first();
    }


}