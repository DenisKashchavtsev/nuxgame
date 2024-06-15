<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistrationControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_registration_form_displayed()
    {
        $response = $this->get('/');

        $response->assertStatus(200)
            ->assertViewIs('register');
    }

    public function test_registration_success()
    {
        $userData = [
            'username' => $this->faker->userName,
            'phonenumber' => $this->faker->phoneNumber,
        ];

        $response = $this->post('/', $userData);

        $this->assertDatabaseHas('users', [
            'username' => $userData['username'],
            'phonenumber' => $userData['phonenumber'],
        ]);

        $response->assertStatus(200)
            ->assertViewIs('register_success')
            ->assertViewHas('link');
    }

    public function test_registration_validation()
    {
        $userData = [];

        $response = $this->post('/', $userData);

        $response->assertStatus(302)
            ->assertSessionHasErrors(['username', 'phonenumber']);
    }
}
