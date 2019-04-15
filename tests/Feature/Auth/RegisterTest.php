<?php

namespace Tests\Feature\Auth;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;
    protected $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->make();
    }

    /**
     * @test
     */
    public function that_a_user_can_see_a_register_form()
    {
        $this->get(route('register'))
            ->assertViewIs('auth.register')
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function that_a_user_can_register()
    {
        $this->post(route('register'), $this->user->toArray())
            ->assertRedirect('/');
    }
}
