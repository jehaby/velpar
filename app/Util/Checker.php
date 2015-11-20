<?php


namespace App\Util;



class Checker
{


    public function check($text, $pattern)
    {
        return preg_match($pattern, $text) === 1;
    }


    // TODO: е|ё ,



}