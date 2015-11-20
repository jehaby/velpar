<?php


namespace App\Services;

use App\Repositories\PatternRepository;



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


    }


    public function edit(array $input)
    {
                
    }


}