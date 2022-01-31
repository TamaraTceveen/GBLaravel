<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('source')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $title = $faker->sentence(5);
            $data[] = [
                'source' => $faker->sentence(7),
                'title' => $title,
                'author' => $faker->userName(),
                'description' => $faker->text(100),
                'category' => $faker->sentence(3)
            ];
        }
        return $data;
    }
}
