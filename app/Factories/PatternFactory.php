<?php


namespace App\Factories;


use App\Pattern;
use App\Util\StringHelper;

class PatternFactory
{

    /**
     * @var StringHelper
     */
    private $helper;


    public function __construct(StringHelper $helper)
    {
        $this->helper = $helper;
    }

    /**
     * @param $user_id
     * @param $sections_ids
     *
     */
    public function create($patternText, $userId, $sectionsIds, $prefixes = null)
    {
        $patternText = $this->helper->preparePatter($patternText);


    }



}