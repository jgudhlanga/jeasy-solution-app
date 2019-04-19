<?php

namespace Tests\Feature\Events;

use App\Modules\Events\Event;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReadEventTest extends TestCase
{
   use RefreshDatabase;

   protected $event;
   protected $events;
   protected $user;

   public function setUp(): void
   {
       parent::setUp();
       $this->user = create(User::class);
       $this->event = create(Event::class);
       $this->events = create(Event::class, [], 10);
   }

    /**
     * @test
     */
    public function a_guest_can_not_access_events_endpoint()
    {
        $this->withExceptionHandling()
            ->get(route('events.index'))
            ->assertRedirect(route('login'));
    }

    /**
     * @test
     */
    public function a_guest_can_not_access_event_show_endpoint()
    {
        $this->withExceptionHandling()
            ->get(route('events.show', [$this->event->slug]))
            ->assertRedirect(route('login'));
    }

    /**
    * @test
    */
   public function a_user_can_see_list_of_events(): void
   {
        $this->signIn()
            ->get(route('events.index'))
            ->assertStatus(200);
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->events);
   }

   /**
    * @test
    */
   public function that_a_user_can_view_an_event(): void
   {
       $this->signIn()
           ->get(route('events.show', [$this->event->slug]))
            ->assertViewIs('events.show')
            ->assertStatus(200)
            ->assertSee(htmlentities($this->event->title), ENT_QUOTES)
            ->assertSee(htmlentities($this->event->description), ENT_QUOTES);
   }
}
