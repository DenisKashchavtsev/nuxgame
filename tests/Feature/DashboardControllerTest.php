<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_dashboard_index()
    {
        $user = User::factory()->create();

        $response = $this->get(route('dashboard', ['user' => $user]));

        $response->assertStatus(200)
            ->assertViewIs('dashboard.index')
            ->assertViewHas('user', $user);
    }

    public function test_generate_link()
    {
        $user = User::factory()->create();

        $response = $this->post(route('dashboard.generateLink', ['user' => $user]));

        $response->assertStatus(200)
            ->assertViewIs('dashboard.generate_link_success')
            ->assertViewHas('link');
    }

    public function test_deactivate_link()
    {
        $user = User::factory()->create();

        $response = $this->post(route('dashboard.deactivateLink', ['user' => $user]));

        $response->assertStatus(200)
            ->assertViewIs('dashboard.deactivate_link_success');
    }

    public function test_history()
    {
        $user = User::factory()->create();

        $response = $this->get(route('dashboard.history', ['user' => $user]));

        $response->assertStatus(200)
            ->assertViewIs('dashboard.history')
            ->assertViewHas('history');
    }

    public function test_im_feeling_lucky()
    {
        $user = User::factory()->create();

        $response = $this->post(route('dashboard.imFeelingLucky', ['user' => $user]));

        $response->assertStatus(302)
        ->assertSessionHas('luckyResult');
    }
}
