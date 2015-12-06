<?php

namespace App\Http\Controllers;

use App\Prefix;
use App\Repositories\PatternRepository;
use App\Repositories\SectionRepository;
use App\Services\PatternService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Util\StringHelper;

use App\Regex;
use App\Pattern;
use App\Section;
use App\User;


use App\Repositories\PrefixRepository;


class TestController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth', ['except' => 'noauth']);
    }



    public function test(PatternRepository $repository)
    {

        $pattern = $repository->getRandom();

        $pattern_prefix = array_map(function($item) use ($pattern) {
            return ['pattern_id' => $pattern->id, 'prefix_id' => $item];
        }, $pattern->prefixes()->lists('id')->all());

        dd($pattern_prefix);

        dd($repository->getRandom());

        $pattern = Pattern::random()->first();

        $pattern_prefix = array_map(function($item) use ($pattern) {
            return ['pattern_id' => $pattern->id, 'prefix_id' => $item];
        }, $pattern->prefixes()->lists('id')->all());





        $data =  [
            'regex' => '/new_shit/ui',  // should process with StringHelper, maybe earlier
            'section_ids' => [60, 63, 1],  // must be at least one
            'prefix_ids' => [1, 3, 5],
        ];

        $pattern = $service->create($data);

        dd($pattern);

        dd(Regex::whereId(1)->with(['patterns.sections', 'patterns.prefixes']));

    }


    public function noauth(PatternService $service)
    {
        $data =                 [
            'user_id' => 1,
            'regex' => '/new_shit/ui',  // should process with StringHelper, maybe earlier
            'section_ids' => [60, 63],  // must be at least one
            'prefix_ids' => [1, 3, 5],
        ];


        $pattern = $service->create($data);
        dd($pattern);
    }


}
