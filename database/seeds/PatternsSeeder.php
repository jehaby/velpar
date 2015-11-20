<?php

use Illuminate\Database\Seeder;


use App\User;
use App\Pattern;
use App\Regex;
use App\Section;
use App\Prefix;


class PatternsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $pattern = Regex::create(['text' => '/shimano/ui'])->patterns()->create([]);

        $pattern->prefixes->saveMany([

        ]);



    }
}
