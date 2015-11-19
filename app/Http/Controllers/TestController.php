<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Util\StringHelper;


class TestController extends Controller
{


    public function __construct(StringHelper $helper)
    {
        $this->helper = $helper;
    }


    public function test()
    {

        $str = 'ель';

        $expected = '[её]ль';
//        var_dump($str, $this->helper->processYo($str) );

        $res = $this->helper->processYo($str);

//        dd(bin2hex('е'), bin2hex('ё'));

        var_dump($str, $expected, $res);

        dd(bin2hex($str), bin2hex($expected), bin2hex($res));

//        dd(bin2hex($expected), bin2hex($res));



        dd(utf($expected), pack($res));

        dd(strlen($expected), strlen($res));

        dd($str, $res, strcmp($expected, $res));


        dd(utf8_decode(imap_utf8($str)));
        dd($str, $this->helper->processYo($str) );
    }


}
