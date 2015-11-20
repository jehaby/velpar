<?php

use Illuminate\Database\Seeder;
use App\Prefix;

class PrefixesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prefixes = [
            1 => 'Продам',
            2 => 'Куплю',
            3 => 'Меняю',
            4 => 'Предложение',
            5 => 'Спрос',
        ];

        foreach ($prefixes as $id => $title) {

            Prefix::create([
                'id' => $id,
                'title' => $title
            ]);

        }
    }
}
