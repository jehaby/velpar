<?php


namespace App\Repositories;


use App\Contracts\BaseRepositoryContract;
use App\Exceptions\UserAlreadyHaveSuchPatternException;
use App\User;
use Illuminate\Database\QueryException;


class UserRepository implements BaseRepositoryContract
{

    /**
     * @var User
     */
    private $model;


    public function __construct(User $user) {
        $this->model = $user;
    }


    public function addPattern(\App\Pattern $pattern)
    {
        try {
            $this->model->patterns()->save($pattern);
        } catch (QueryException $e) {
            if ($e->getCode() === '23505') {  // TODO: this is probably sucks
                throw new UserAlreadyHaveSuchPatternException('', $e);
            }
        }
    }


    public function getPatterns()
    {
        return $this->model->patterns();
    }


    public function getThemes()
    {
        return $this->model->themes();
    }


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
        // TODO: Implement create() method.
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