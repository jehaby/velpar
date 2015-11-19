<?php


use App\Velpar\Checker;


class CheckerTest extends PHPUnit_Framework_TestCase
{


    public function setUp()
    {
        $this->checker = new Checker();
    }


    /**
     * @dataProvider falseProvider()
     */
    public function testCheckFalse($text, $patternText)
    {
        $this->assertFalse($this->checker->check($text, $patternText));
    }

    /**
     * @dataProvider trueProvider()
     */
    public function testCheckTrue($text, $patternText)
    {
        $this->assertTrue($this->checker->check($text, $patternText));
    }


    public function falseProvider()
    {
        return [
            ['Клевый рюкзак', '/руль/ui'],
            ['Shimano', '/SRAM/ui'],
            ['Не знаю зачем это тут', '/wtf/ui'],
        ];
    }


    public function trueProvider()
    {
        return [
            ['Большой Рюкзак', '/рюкзак/ui'],
            ['Комплекст колёс', '/кол[её]с.*/ui'],
            ['Клевые колеса', '/кол[её]с.*/ui'],
            ['колеса Mavic Crossmax Enduro 27,5', '/mavic crossmax/ui']
        ];
    }

}
