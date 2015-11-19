<?php


namespace App\Util;


class StringHelper
{


    /**
     * @param string $pattern - raw text for pattern
     */
    public function preparePattern($pattern)
    {

        return '/' . $this->processYo(mb_strtolower($pattern), 'UTF-8') . '/ui';

    }


    private function processYo($pattern)
    {

        if (str_contains($pattern, ['ё', 'е'])) {
            return str_replace(['ё', 'е'], '[её]', $pattern);
        }

        return $pattern;

    }



}