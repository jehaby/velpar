<?php


use App\Services\PatternService;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class PatternServiceTest extends TestCase
{

    /**
     * @var PatternService
     */
    private $service;


    public function setUp()
    {
        parent::setUp();
        $this->service = $this->app->make('App\Services\PatternService');
    }

    /**
     * @dataProvider createDataProvider()
     */
    public function testCreate($data)
    {
        $this->assertNotNull($newPatternId = $this->service->createOrReturnExisting($data)->id);

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
    public function testTryFindPattern($data) {
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

}
