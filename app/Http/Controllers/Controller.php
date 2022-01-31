<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

//    public function getNews(?int $id = null): array
//    {
//        $faker = Factory::create();
//        $data = [];
//
//        if($id){
//            return  [
//                'id' => $id,
//                'title' => $faker->jobTitle(),
//                'description' => $faker->text(100),
//                'author' => $faker->userName(),
//                'created_at' => now('Europe/Amsterdam')
//            ];
//        }
//        for($i=1; $i<=10; $i++) {
//            $data[] = [
//                'id' => $i,
//                'category_id' => mt_rand(1, 5),
//                'title' => $faker->jobTitle(),
//                'description' => $faker->text(100),
//                'author' => $faker->userName(),
//                'created_at' => now('Europe/Amsterdam')
//            ];
//        }
//
//        return $data;
//    }

//    public function newsCategories(?int $id = null):array
//    {
//        $faker = Factory::create();
//        $data = [];
//
//        if($id){
//            $categoryName = $faker->city();
//            for($i=1; $i<=5; $i++) {
//                $data[] = [
//                    'news_id' => $i,
//                    'category_id' => $id,
//                    'categoryName' => $categoryName,
//                    'title' => $faker->jobTitle(),
//                    'description' => $faker->text(100),
//                    'author' => $faker->userName(),
//                    'created_at' => now('Europe/Amsterdam')
//                ];
//            }
//
//            return  $data;
//        }
//
//        for($i=1; $i<=5; $i++) {
//            $data[] = [
//                'id' => $i,
//                'categoryName' => $faker->city(),
//                'created_at' => now('Europe/Amsterdam')
//            ];
//        }
//
//        return $data;
//    }
}
