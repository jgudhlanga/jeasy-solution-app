<?php

namespace App\Modules\Events\Repositories;

use App\Modules\Events\Models\Event;
use App\Repositories\AbstractRepository;
use Carbon\Carbon;

class EloquentEvent extends AbstractRepository implements EventRepository
{
    protected $model;

    public function __construct(Event $event)
    {
        $this->model = $event;
    }

    public function getUpcomingEvents()
    {
        return $this->model
            ->where('end_date', '>', Carbon::today()->format('Y-m-d'))
            ->orderBy('start_date', 'desc')
            ->get();
    }

    public function getPastEvents()
    {
        return $this->model
            ->where('end_date', '<', Carbon::today()->format('Y-m-d'))
            ->orderBy('start_date', 'desc')
            ->limit(3)
            ->get();
    }
}