<?php

namespace Tests\Feature\Events;

use App\Modules\Events\Event;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateEventTest extends TestCase
{
    use RefreshDatabase;

    protected $event;
    protected $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = create(User::class);
        $this->event = make(Event::class);
    }

    /**
     * @test
     */
    public function that_a_guest_can_not_access_event_create_endpoint()
    {
        $this->withExceptionHandling()
            ->get(route('events.create'))
            ->assertRedirect(route('login'));
    }

    /**
     * @test
     */
    public function tha_a_user_see_the_event_create_page()
    {
        $this->signIn()
            ->get(route('events.create'))
            ->assertViewIs('events.create');
    }

    /**
     * @test
     */
    public function that_it_can_store_the_event()
    {
        $res = $this->signIn()
            ->post(route('events.store', $this->event->toArray()))
            ->assertRedirect('events/'.$this->event->slug);
        $this->assertDatabaseHas('events', [
            'title' => $this->event->title,
            'address' => $this->event->address,
            'start_date' => $this->event->start_date,
            'end_date' => $this->event->end_date,
            'description' => $this->event->description,
            'lat' => $this->event->lat,
            'long' => $this->event->long,
        ]);
    }

    /**
     * @test
     */
    public function that_title_is_required()
    {
        $this->postEvent(['title' => null])->assertSessionHasErrors(['title']);
    }

    /**
     * @test
     */
    public function that_address_is_required()
    {
        $this->postEvent(['address' => null])->assertSessionHasErrors(['address']);
    }

    /**
     * @test
     */
    public function that_start_date_is_required()
    {
        $this->postEvent(['start_date' => null])->assertSessionHasErrors(['start_date']);
    }

    /**
     * @test
     */
    public function that_end_date_is_required()
    {
        $this->postEvent(['end_date' => null])->assertSessionHasErrors(['end_date']);
    }

    /**
     * @test
     */
    public function that_description_is_required()
    {
        $this->postEvent(['description' => null])->assertSessionHasErrors(['description']);
    }

    /**
     * @test
     */
    public function that_long_is_required()
    {
        $this->postEvent(['long' => null])->assertSessionHasErrors(['long']);
    }

    /**
     * @test
     */
    public function that_lat_is_required()
    {
        $this->postEvent(['lat' => null])->assertSessionHasErrors(['lat']);
    }

    /**
     * @param array $overrides
     * @return \Illuminate\Foundation\Testing\TestResponse
     */
    protected function postEvent($overrides = []) {
        $event = make(Event::class, $overrides);
        return $this->signIn()
            ->withExceptionHandling()
            ->post(route('events.store', $event->toArray()));
    }
}
