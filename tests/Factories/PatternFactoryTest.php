<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Factories\PatternFactory;

class PatternFactoryTest extends TestCase
{


    public function setUp()
    {
        parent::setUp();
        $this->factory = new PatternFactory();
    }


    public function testCreate()
    {
        $this->assertTrue(true);
    }





}
