<?php

use Illuminate\Database\Seeder;
use App\Section;

class SectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections = [
            130 => 'Велосипеды шоссе',
            131 => 'Велосипеды МТБ',
            128 => 'Рамы шоссе',
            129 => 'Рамы МТБ',
            95 => 'Услуги',
            60 => 'Колёса',
            61 => 'Вилки и амортизаторы',
            62 => 'Сидим и рулим',
            63 => 'Крутим',
            64 => 'Переключаем',
            65 => 'Тормозим',
            66 => 'Одежда, обувь и защита',
            73 => 'Туристическое снаряжение',
            80 => 'Свет и электричество',
            70 => 'Aксессуары',
            87 => 'Не велосипедное',
            69 => 'Меняю',
            81 => 'Подарю!',
            72 => 'Украли!'
        ];

        foreach ($sections as $id => $title) {
            Section::create([
                'id' => $id,
                'title' => $title
            ]);
        }

    }
}
