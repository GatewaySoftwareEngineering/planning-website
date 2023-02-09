<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Faker\Factory;

class AuthTest extends TestCase
{

    public function testFailedLogin()
    {
        $loginData = ['email' => 'sample1@test.com', 'password' => 'sample123',];

        $this->json('POST', 'api/auth/login', $loginData, ['Accept' => 'application/json'])
            ->assertStatus(401)
            ->assertJsonStructure([
                "message"
            ]);
    }

    public function testSuccessfulLogin()
    {
        User::factory()->create([
           'email'    => 'sample@test.com',
           'password' => 'password',
           'role_id'  =>3
        ]);

        $loginData = ['email' => 'sample@test.com', 'password' => 'password'];

        $this->json('POST', 'api/auth/login', $loginData, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
               "user" => [
                   'id',
                   'name',
                   'email',
                   'email_verified_at',
                   'created_at',
                   'updated_at',
               ],
                "token"
            ]);

        $this->assertAuthenticated();
    }
}
