<?php

namespace App\Modules\Events\Repositories;

use App\Modules\Events\Models\Event;
use App\Repositories\AbstractInterface;

interface EventRepository extends AbstractInterface
{
    public function getUpcomingEvents();

    public function getPastEvents();

    public function registerForEvent(Event $event);

    public function deRegisterFromEvent(Event $event);
}
