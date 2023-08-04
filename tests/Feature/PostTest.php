<?php

namespace Tests\Feature;

use Tests\TestCase;

class PostTest extends TestCase
{
    /** @test*/
    public function canCreateAPost()
    {
        $data = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph
        ];

        $response = $this->json('POST', '/api/v1/posts', $data);

        $response->assertStatus(201)
            ->assertJson(compact('data'));

        //assertion
        $this->assertDatabaseHas('posts', [
            'title' => $data['title'],
            'description' => $data['description']
        ]);
    }
}
