<?php

namespace App\Http\Controllers;

use App\Prefix;
use App\Repositories\SectionRepository;
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


    public function __construct(StringHelper $helper)
    {
        $this->helper = $helper;
    }


    public function test(PrefixRepository $prefixRepository, SectionRepository $sectionRepository )
    {


        $pattern = Regex::create(['text' => '/sram/ui'])->patterns()->create([]);

        $pattern->prefixes()->saveMany(
            $prefixRepository->getByIds([1, 3])->all()
        );

        $pattern->sections()->saveMany(
            $sectionRepository->getByIds([60, 63])->all()
        );

        dd($pattern);

    }


}
