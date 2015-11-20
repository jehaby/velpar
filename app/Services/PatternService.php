<?php


namespace App\Services;

use App\Repositories\PatternRepository;
use App\Util\StringHelper;



class PatternService
{


    public function __construct(PatternRepository $patternRepository)
    {
        $this->patternRepository = $patternRepository;
    }


    public function create(array $input)
    {
        // get user
        // get pattern text
        // get sections
        // get prefixes


        $data = [
            'user_id' => 1,
            'regex' => '/руль/ui',
            'section_ids' => [],  // must be at least one
            'prefix_ids' => [],
        ];

        // first check regex, if already exists then get id, otherwise create  ( findOrCreate )
        //  then fill patterns_prefixes and patterns_sections

        // what if user adds same pattern twice (or pattern that already exists on other user(s)?

        // what if user changes pattern that connected with other user(s)?

        // what if user deletes pattern that connected with other user(s)?


    }


    public function edit(array $input)
    {

    }


}