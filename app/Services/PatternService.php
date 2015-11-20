<?php


namespace App\Services;

use App\Repositories\PatternRepository;
use App\Repositories\PrefixRepository;
use App\Repositories\RegexRepository;
use App\Repositories\SectionRepository;
use App\Repositories\ThemeRepository;
use App\User;
use App\Theme;
use App\Util\StringHelper;



class PatternService
{


    public function __construct(
        PatternRepository $patternRepository,
        PrefixRepository $prefixRepository,
        RegexRepository $regexRepository,
        SectionRepository $sectionRepository,
        ThemeRepository $themeRepository
    ) {
        $this->patternRepository = $patternRepository;
        $this->prefixRepository = $prefixRepository;
        $this->regexRepository = $regexRepository;
        $this->sectionRepository = $sectionRepository;
        $this->themeRepository = $themeRepository;
    }


    public function create(array $input)
    {
        // get user
        // get pattern text
        // get sections
        // get prefixes


        $data = [
            'user_id' => 1,
            'regex' => '/руль/ui',  // should process with StringHelper, maybe earlier
            'section_ids' => [60, 63],  // must be at least one
            'prefix_ids' => [1, 3],
        ];



        $regex = $this->regexRepository->findOrCreate('regex');

        $pattern = $regex->patterns()->create([]);

        $pattern->prefixes()->saveMany(
            $this->prefixRepository->getByIds($data['prefix_ids'])->all()
        );

        $pattern->sections()->saveMany(
            $this->sectionRepository->getByIds($data['section_ids'])->all()
        );


        dd();


        $pattern = $this->patternRepository->create($regex->id);

        $pattern = $this->checkIfSamePatternExists();   // TODO: stop here!!!





        // first check regex, if already exists then get id, otherwise create  ( findOrCreate )
        //  then fill patterns_prefixes and patterns_sections

        // what if user adds same pattern twice (or pattern that already exists on other user(s)?

        // what if user changes pattern that connected with other user(s)?

        // what if user deletes pattern that connected with other user(s)?


    }


    public function edit(array $input)
    {

    }


    public function checkForExistingEntity($data)
    {

        $data = [
            'regex' => '/руль/ui',  // should process with StringHelper, maybe earlier
            'section_ids' => [60, 64],  // must be at least one
            'prefix_ids' => [1],
        ];

        $regex = $this->regexRepository->findOrCreate($data['regex']);


        foreach ($regex->patterns() as $pattern) {

            $pattern->sections();


        }


    }


}