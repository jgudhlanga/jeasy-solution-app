<?php

namespace Tests\Feature\Events;

use App\Modules\Events\Event;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReadEventTest extends TestCase
{
   use RefreshDatabase;

   protected $event;

   public function setUp(): void
   {
       parent::setUp();
       $this->event = factory(Event::class)->create();
   }
    /**
    * @test
    */
   public function a_user_can_see_list_of_events(): void
   {
        $this->get(route('events.index'))
            ->assertStatus(200)
            ->assertSee(htmlentities($this->event->title), ENT_QUOTES)
            ->assertSee(htmlentities($this->event->description), ENT_QUOTES);
   }

   /**
    * @test
    */
   public function that_a_user_can_view_an_event(): void
   {
        $this->get(route('events.show', [$this->event->id]))
            ->assertViewIs('events.show')
            ->assertStatus(200)
            ->assertSee(htmlentities($this->event->title), ENT_QUOTES)
            ->assertSee(htmlentities($this->event->description), ENT_QUOTES);
   }
}
