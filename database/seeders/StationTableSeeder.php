<?php

namespace Database\Seeders;

use App\Models\Station;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $faker = Factory::create();

        // Station::query()->create([
        //     'name' => 'Аметьево',
        // ]);
        // Station::query()->create([
        //     'name' => 'Прсопект победы',
        // ]);
        // Station::query()->create([
        //     'name' => 'Козья Слобода',
        // ]);
        // Station::query()->create([
        //     'name' => 'Дубравная',
        // ]);
        // Station::query()->create([
        //     'name' => 'Кремлевская',
        // ]);
        // Station::query()->create([
        //     'name' => 'Габдулла Тукая',
        // ]);
        // Station::query()->create([
        //     'name' => 'Авастроителььный',
        // ]);
        // Station::query()->create([
        //     'name' => 'Яшьлек',
        // ]);
        Station::query()->create([
            'name' => 'Северный вокзал',
        ]);
        Station::query()->create([
            'name' => 'Площадь Габдуллы Тукая',
        ]);
        Station::query()->create([
            'name' => 'Суконная слобода',
        ]);
        Station::query()->create([
            'name' => 'Горки',
        ]);
    }
}
