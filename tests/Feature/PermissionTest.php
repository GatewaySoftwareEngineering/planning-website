<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PermissionTest extends TestCase
{
    public function testStorePermission()
    {
        $user = User::factory()->create();
        $data = [
            'name' => 'test',
            'display_name' => 'Test permission',
            'entity_name' => 'tests'
        ];
        $this->actingAs($user, 'api')
            ->json('POST', 'api/permissions', $data, $this->getHeaders())
            ->assertStatus(200)
            ->assertJsonStructure([
                "message",
                "data" => [
                    "name",
                    "display_name",
                    "entity_name",
                    "id"
                ]
            ]);
    }
}
