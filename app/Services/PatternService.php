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
        ThemeRepository $themeRepository,
        User $user                              // TODO: repository?
    ) {
        $this->patternRepository = $patternRepository;
        $this->prefixRepository = $prefixRepository;
        $this->regexRepository = $regexRepository;
        $this->sectionRepository = $sectionRepository;
        $this->themeRepository = $themeRepository;
        $this->user = $user;
    }


    /**
     * @param array $data
     * @return \App\Pattern
     */
    public function createOrReturnExisting(array $data)
    {

        // TODO: User!

        $regex = $this->regexRepository->findOrCreate($data['regex']);


        foreach ($regex->patterns as $pattern) {  // TODO: move to repo (patterns? regexes? )

            if (
                arrays_have_same_values($data['section_ids'], $pattern->sections->pluck('id')->all())    // you are getting collection of App\Section!!
                && arrays_have_same_values($data['prefix_ids'], $pattern->prefixes->pluck('id')->all())
            ) {
                return $pattern;
            }
        }

        $pattern = $regex->patterns()->create([]);

        $pattern->prefixes()->saveMany(   // TODO: move it to pattern or prefix repo ?
            $this->prefixRepository->getByIds($data['prefix_ids'])->all()
        );

        $pattern->sections()->saveMany(   // TODO: move it to pattern or section repo ?
            $this->sectionRepository->getByIds($data['section_ids'])->all()
        );

        return $pattern;


        // first check regex, if already exists then get id, otherwise create  ( findOrCreate )
        //  then fill patterns_prefixes and patterns_sections

        // what if user adds same pattern twice (or pattern that already exists on other user(s)?

        // what if user changes pattern that connected with other user(s)?

        // what if user deletes pattern that connected with other user(s)?


    }


    public function edit(array $input)
    {





        // if pattern has only one user, it should be easy. But what happens with all the themes already connected to this pattern?
        // Maybe it will be easier to just create new pattern?

    }


    public function delete($patternId)  // or model?
    {


        // if pattern has only one user, it should be easy. But what happens with all the themes already connected to this pattern?


    }



}