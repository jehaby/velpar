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

        $pattern = $service->createOrReturnExisting([]);

        dd($pattern);

    }


}
