<?php


namespace App\Modules\Events\Listeners;

use App\Modules\Events\Events\EventRegistered;
use App\Modules\Events\Jobs\RegistrationConfirmationEmailJob;

class EventListener
{

    public function subscribe($events)
    {
        $class = "App\Modules\Events\Listeners\EventListener";
        $events->listen(EventRegistered::class, "{$class}@handleEventRegistered");
    }

    public function handleEventRegistered(EventRegistered $eventRegistered)
    {
        dispatch(new RegistrationConfirmationEmailJob($eventRegistered->event, $eventRegistered->user));
    }
}
