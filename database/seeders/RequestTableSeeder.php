<?php

namespace Database\Seeders;

use App\Models\Request;
use Faker\Factory;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        for ($i=0; $i <50 ; $i++) {
            Request::query()->create([
                'desk'=>$faker->sentence(rand(1,1)),
                'service'=>$faker->name,
                'comment'=>$faker->sentence(rand(7,10)),
                'station_id'=>$faker->numberBetween(2,9),
                'user_id'=>$faker->numberBetween(1,2),
            ]);
        }
    }
}
