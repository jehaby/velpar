<?php

use App\Exceptions\WrongSectionIdException;
use App\Repositories\SectionRepository;


class SectionRepositoryTest extends TestCase {


    /**
     * @var SectionRepository
     */
    private $repo;



    public function setUp()
    {
        parent::setUp();
        $this->repo = $this->app->make('App\Repositories\SectionRepository');
    }


    public function testGetByIdsThrowsException()
    {
        $this->setExpectedException('App\Exceptions\WrongSectionIdException');
        $this->repo->getByIds([129, 33]);
    }

}
