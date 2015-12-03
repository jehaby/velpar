<?php


namespace App\Services;

use App\Repositories\PatternRepository;
use App\Repositories\PrefixRepository;
use App\Repositories\RegexRepository;
use App\Repositories\SectionRepository;
use App\Repositories\ThemeRepository;
use App\Repositories\UserRepository;
use App\Theme;
use App\Util\StringHelper;
use App\Exceptions\UserAlreadyHaveSuchPatternException;



/**
 * Class PatternService
 *
 * Represents various actions with Pattern.
 *
 * @package App\Services
 */
class PatternService
{


    public function __construct(
        PatternRepository $patternRepository,
        PrefixRepository $prefixRepository,
        RegexRepository $regexRepository,
        SectionRepository $sectionRepository,
        ThemeRepository $themeRepository,
        UserRepository $userRepository
    ) {
        $this->patternRepository = $patternRepository;
        $this->prefixRepository = $prefixRepository;
        $this->regexRepository = $regexRepository;
        $this->sectionRepository = $sectionRepository;
        $this->themeRepository = $themeRepository;
        $this->userRepository = $userRepository;
    }


    /**
     * @param array $data
     * @return \App\Pattern
     */
    public function createOrReturnExisting(array $data)
    {

        $pattern = $this->tryFindPattern($data['regex'], $data['section_ids'], $data['prefix_ids']);

        if (! $pattern) {
            $pattern = $this->patternRepository->create([
                'regex' => $this->regexRepository->findOrCreate($data['regex']),
                'sections' => $this->sectionRepository->getByIds($data['section_ids'])->all(),
                'prefixes' => $this->prefixRepository->getByIds($data['prefix_ids'])->all()
            ]);
        }

        try {
            $this->userRepository->addPattern($pattern);
        } catch (UserAlreadyHaveSuchPatternException $e) {
            dd($e);
        }

        return $pattern;

    }


    /**
     * @param $regexText string
     * @param $sectionIds array
     * @param $prefixIds array
     */
    public function tryFindPattern($regexText, $sectionIds, $prefixIds)
    {

        if ( ! $regex = $this->regexRepository->getWhere('text', $regexText) ) {
            return null; // or false?
        }

        $patterns = $regex->patterns;               // TODO: eager loading!

        foreach ($regex->patterns as $pattern) {  // TODO: move to repo (patterns? regexes? )  it might be possible to do much faster using cool big scary query to database

            if (
                arrays_have_same_values($sectionIds, $pattern->sections->pluck('id')->all())    // you are getting collection of App\Section!!
                && arrays_have_same_values($prefixIds, $pattern->prefixes->pluck('id')->all())
            ) {
                return $pattern;
            }
        }

        return null;

    }


    /**
     * Edits existing pattern
     *
     * @param Pattern $pattern
     * @param array $newData
     */
    public function edit(Pattern $pattern, array $newData)
    {









        // If pattern has only one user, it should be easy.
        // But what happens with all the themes already connected to this pattern ?!
        // Maybe it will be easier to just create new pattern?

    }


    public function delete($patternId)  // or model?
    {


        // if pattern has only one user, it should be easy. But what happens with all the themes already connected to this pattern?


    }


    public function getAllPatternsForUser()
    {
        return $this->userRepository->getPatterns();
    }


}