<?php


class HelpersTest extends PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider arraysHaveSameValuesProvider()
     */
    public function testArraysHaveSameValues($first, $second, $res)
    {
        $this->assertEquals($res, arrays_have_same_values($first, $second));
        $this->assertEquals($res, arrays_have_same_values($second, $first));
    }


    public function arraysHaveSameValuesProvider()
    {
        return [
            [
                [1, 2, 3], [3, 2, 1], true
            ],
            [
                [1, 2], [], false
            ],
            [
                [1, 2, 3, 4], [1, 2, 3, 4, 5], false
            ]
        ];
    }



}
