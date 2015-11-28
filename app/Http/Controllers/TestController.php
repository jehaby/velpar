<?php

namespace App\Http\Controllers;

use App\Prefix;
use App\Repositories\SectionRepository;
use App\Services\PatternService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Util\StringHelper;

use App\Regex;
use App\Pattern;
use App\Section;


use App\Repositories\PrefixRepository;


class TestController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth', ['except' => 'getLogout']);
    }





    public function test(PatternService $service)
    {

//        dd(Regex::where('text', '/sramchikk/ui')->first());

        $data =                 [
            'user_id' => 1,
            'regex' => '/sramchik/ui',  // should process with StringHelper, maybe earlier
            'section_ids' => [60, 63, 66],  // must be at least one
            'prefix_ids' => [1, 3, 5],
        ];


        $pattern = $service->createOrReturnExisting($data);

        dd($pattern);

    }


}
