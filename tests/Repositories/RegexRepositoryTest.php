<?php


use App\Repositories\RegexRepository;
use App\Regex;


class RegexRepositoryTest extends TestCase
{



    public function setUp()
    {
        parent::setUp();
        $this->repo = new RegexRepository(new Regex);
    }


    public function testFindOrCreate()
    {
        $this->repo->findOrCreate('/руль/ui');
        $this->seeInDatabase('regexes', ['text' => '/руль/ui']);
    }


}
