<?php

namespace Tests\Feature\Events;

use App\Modules\Events\Event;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventTest extends TestCase
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
        $this->get(route('events'))
            ->assertStatus(200)
            ->assertSeeText($this->event->title)
            ->assertSeeText($this->event->description);
   }
}
