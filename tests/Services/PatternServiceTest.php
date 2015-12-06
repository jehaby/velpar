<?php


use App\Services\PatternService;
use App\Repositories\PatternRepository;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class PatternServiceTest extends TestCase
{

    /**
     * @var PatternService
     */
    private $service;


    /**
     * @var PatternRepository
     */
    private $patternReposiotry;


    public function setUp()
    {
        parent::setUp();
        $this->service = $this->app->make(PatternService::class);

    }


    /**
     * @dataProvider createDataProvider()
     */
    public function testCreate($data)
    {
        $this->assertNotNull($newPatternId = $this->service->create($data)->id);

        $this->seeInDatabase('regexes', ['text' => $data['regex']]);
        $this->seeInDatabase('patterns', ['id' => $newPatternId]);
        foreach ($data['section_ids'] as $sectionId) {
            $this->seeInDatabase('pattern_section', ['pattern_id' => $newPatternId, 'section_id' => $sectionId]);
        }
        foreach ($data['prefix_ids'] as $prefixId) {
            $this->seeInDatabase('pattern_prefix', ['pattern_id' => $newPatternId, 'prefix_id' => $prefixId]);
        }
    }


    public function testCreateNotCreatesDuplicate()
    {
        // TODO: implement test
    }



    /**
     * @dataProvider tryFindPatternProvider
     */
    public function testTryFindPattern(array $data) {
        $this->seeInDatabase('regexes', ['text' => $data['regex']]);
        foreach ($data['section_ids'] as $sectionId) {
            $this->seeInDatabase('pattern_section', ['section_id' => $sectionId]);
        }
        foreach ($data['prefix_ids'] as $prefixId) {
            $this->seeInDatabase('pattern_prefix', ['prefix_id' => $prefixId]);
        }
        $this->assertNotNull($newPatternId = $this->service->tryFindPattern($data['regex'], $data['section_ids'], $data['prefix_ids']));
    }


    public function createDataProvider() {
        return [
            [
                [
                    'user_id' => 1,
                    'regex' => '/sramchik/ui',  // should process with StringHelper, maybe earlier
                    'section_ids' => [60, 63],  // must be at least one
                    'prefix_ids' => [1, 3, 5],
                ],
            ],

        ];
    }


    public function tryFindPatternProvider() {
        return [
            [
                [
                    'regex' => '/very_special_regex/ui',  // should process with StringHelper, maybe earlier
                    'section_ids' => [60, 63],  // must be at least one
                    'prefix_ids' => [1, 3, 5],
                ],
            ],
        ];
    }



    public function testDeletePattern() {

        $repo = $this->app->make(PatternRepository::class);
        $pattern = $repo->getRandom();

        $patternId = $pattern->id;
        $regexId = $pattern->regex_id;
        $prefixesIds = $pattern->prefixes()->lists('id')->all();
        $sectionsIds = $pattern->sections()->lists('id')->all();

        $this->deleteTestHelper('seeInDatabase', $patternId, $regexId, $prefixesIds, $sectionsIds);
        $this->service->delete($pattern);
        $this->deleteTestHelper('dontSeeInDatabase', $patternId, $regexId, $prefixesIds, $sectionsIds);

    }


    private function deleteTestHelper($method, $patternId, $regexId, $prefixesIds, $sectionsIds)
    {
        $this->$method('patterns', ['id' => $patternId, 'regex_id' => $regexId]);

        foreach ($prefixesIds as $prefix_id) {
            $this->$method('pattern_prefix', ['pattern_id' => $patternId, 'prefix_id' => $prefix_id]);
        }

        foreach ($sectionsIds as $section_id) {
            $this->$method('pattern_section', ['pattern_id' => $patternId, 'section_id' => $section_id]);
        }

    }


    public function testEditPattern()
    {
        $repo = $this->app->make(PatternRepository::class);
        $pattern = $repo->getRandom();

        $patternId = $pattern->id;
        $regexId = $pattern->regex->id;
        $prefixesIds = $pattern->prefixes()->lists('id')->all();
        $sectionsIds = $pattern->sections()->lists('id')->all();

        $newSections = [70, 80];

        $editedPattern = $this->service->edit($pattern, ['regex' => '/Emma Watson/ui', 'section_ids' => $newSections, 'prefix_ids' => []]);

        $this->seeInDatabase('patterns', ['id' => $editedPattern->id, 'regex_id' => $editedPattern->regex->id]);
        foreach ($newSections as $sectionId) {
            $this->seeInDatabase('pattern_section', ['pattern_id' => $editedPattern->id, 'section_id' => $sectionId]);
        }
        $this->dontSeeInDatabase('pattern_prefix', ['pattern_id' => $editedPattern->id]);
    }
    


//    public function deletePatternProvider()
//    {
//
//        $pattern = $this->patternReposiotry->getRandom();
//
//        return [
//            [$pattern]
//        ];
//    }

}
