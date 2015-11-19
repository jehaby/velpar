<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Util\StringHelper;

class StringHelperTest extends TestCase
{


    public function setUp()
    {
        parent::setUp();
        $this->helper = new StringHelper();
    }


    /**
     * @dataProvider preparePatternProvider()
     */
    public function testPreparePattern($text, $res)
    {
        $this->assertEquals($res, $this->helper->preparePattern($text));
    }


    public function preparePatternProvider()
    {
        return [
            ['Колесо', '/кол[её]со/ui'],
            ['Shimano SLX', '/shimano slx/ui'],
            ['Рул', '/рул/ui'],
        ];
    }



}
