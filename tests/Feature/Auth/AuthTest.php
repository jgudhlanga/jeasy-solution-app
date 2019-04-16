<?php

namespace Tests\Feature\Auth;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = create(User::class);
    }

    /**
     * @test
     */
    public function that_a_user_can_see_log_in_page() {
        $this->get(route('login'))
            ->assertViewIs('auth.login')
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function that_a_user_can_log_in() {
        $this->withExceptionHandling()
            ->post('login', $this->user->toArray())
            ->assertRedirect('/');
    }

}
