<?php


namespace App\Repositories;

use App\Regex;


class RegexRepository
{


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


}