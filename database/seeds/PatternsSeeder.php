<?php

use Illuminate\Database\Seeder;


use App\User;
use App\Pattern;
use App\Regex;
use App\Section;
use App\Prefix;
use App\Services\PatternService;



class PatternsSeeder extends Seeder
{


    public function __construct(PatternService $service)
    {
        $this->service = $service;
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [
            [
                'regex' => '/руль/ui',  // should process with StringHelper, maybe earlier
                'section_ids' => [60, 63],  // must be at least one
                'prefix_ids' => [1, 3, 5]
            ],
            [
                'regex' => '/pattern_to_delete/ui',  // should process with StringHelper, maybe earlier
                'section_ids' => [60, 63],  // must be at least one
                'prefix_ids' => [1, 3, 5]
            ],
            [
                'regex' => '/very_special_regex/ui',  // should process with StringHelper, maybe earlier
                'section_ids' => [60, 63],  // must be at least one
                'prefix_ids' => [1, 3, 5],
            ],
            [
                'regex' => '/pattern_to_edit/ui',
                'section_ids' => [130, 131],  // must be at least one
                'prefix_ids' => [1, 3, 5]
            ]

        ];

        foreach ($data as $pattern) {
            $this->service->create($pattern);
        }

    }
}
