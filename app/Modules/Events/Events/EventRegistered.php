<?php

namespace App\Modules\Events\Events;

use App\Modules\Events\Models\Event;
use App\User;

class EventRegistered
{
    public $user;
    public $event;

    public function __construct(Event $event, User $user)
    {
        $this->event = $event;
        $this->user = $user;
    }
}
