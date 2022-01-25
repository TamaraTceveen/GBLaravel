<?php

namespace Tests\Feature;

use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FormTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testForm()
    {
        $faker = Factory::create();

        $data = [
            'title' => $faker->title(),
            'author' => $faker->userName(),
            'status' => 'DRAFT',
            'description' => $faker->text(100)
        ];
        $response = $this->post(route('newsComment.store'), $data);

        $response->assertStatus(201);
        $response->assertJson($data);
    }
}
