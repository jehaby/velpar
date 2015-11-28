<?php


namespace App\Repositories;


use App\Contracts\BaseRepositoryContract;


class PatternRepository implements BaseRepositoryContract
{

    protected $model;


    public function errors()
    {
        // TODO: Implement errors() method.
    }

    public function all(array $related = null)
    {
        // TODO: Implement all() method.
    }

    public function get($id, array $related = null)
    {
        // TODO: Implement get() method.
    }

    public function getWhere($column, $value, array $related = null)
    {
        // TODO: Implement getWhere() method.
    }

    public function getRecent($limit, array $related = null)
    {
        // TODO: Implement getRecent() method.
    }

    public function create(array $data)
    {
        // TODO: check data for errors!
        $pattern = $data['regex']->patterns()->create([]);
        $pattern->prefixes()->saveMany($data['prefixes']);
        $pattern->sections()->saveMany($data['sections']);
        return $pattern;
    }

    public function update(array $data)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function deleteWhere($column, $value)
    {
        // TODO: Implement deleteWhere() method.
    }
}