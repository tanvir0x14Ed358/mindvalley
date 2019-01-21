<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthControllerTest extends TestCase
{

    public function testUserLoginsSuccessfully()
    {
        $user = factory(User::class)->create([
            'email' => 'testlogin@user.com',
            'password' => bcrypt('secret'),
        ]);

        $payload = ['email' => 'testlogin@user.com', 'password' => 'secret'];

        $this->json('POST', 'api/login', $payload)
            ->assertStatus(200)
            ->assertJsonStructure([
                    'access_token',
                    'token_type',
                    'expires_in',
            ]);

    }

    public function testsRegistersSuccessfully()
    {
        $payload = [
            'name' => 'John chena',
            'email' => 'john@example.com',
            'password' => 'secret',
        ];

        $this->json('post', '/api/register', $payload)
            ->assertStatus(200)
            ->assertJsonStructure([
                'access_token',
                'token_type',
                'expires_in',
            ]);

    }

    public function testsLoginValidation()
    {
        $this->json('POST', 'api/login')
            ->assertStatus(422)
            ->assertJson([
                'email' => 'The email field is required.',
                'password' => 'The password field is required.',
            ]);
    }


    public function testsRegistrationValidation()
    {
        $this->json('post', '/api/register')
            ->assertStatus(422)
            ->assertJson([
                'email' => 'The email field is required.',
                'password' => 'The password field is required.',
            ]);
    }


}
