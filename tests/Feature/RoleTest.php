<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class RoleTest extends TestCase
{
    public function testStoreRole()
    {
        $data = [
            'name' => 'test',
            'display_name' => 'Test role',
        ];
        $this->json('POST', 'api/roles', $data, $this->getHeaders())
            ->assertStatus(200)
            ->assertJsonStructure([
                "message",
                "data" => [
                    "name",
                    "display_name",
                    "id"
                ]
            ]);
    }
}
