<?php

namespace App\Modules\Events\Repositories;

use App\Modules\Events\Models\Event;
use App\Modules\Events\Models\Participant;
use App\Repositories\AbstractRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class EloquentEvent extends AbstractRepository implements EventRepository
{
    protected $model;

    public function __construct(Event $event)
    {
        $this->model = $event;
    }

    public function getUpcomingEvents()
    {
        $select = [
            'e.id', 'e.title', 'e.address', 'e.start_date', 'e.end_date',
            'e.description', 'e.slug', 'e.user_id', 'p.user_id as user'
        ];
        return $this->model
            ->select($select)
            ->from('events as e')
            ->leftJoin('participants as p', function ($query) {
                $query->on('p.event_id', '=', 'e.id');
                $query->where('p.user_id', Auth::user()->id);
            })
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

    public function registerForEvent(Event $event)
    {
        Participant::create([
            'event_id' => $event->id,
            'user_id' => Auth::user()->id
        ]);
        return true;
    }

    public function deRegisterFromEvent(Event $event)
    {
        Participant::where('event_id', $event->id)
            ->where('user_id', Auth::user()->id)
            ->delete();
        return true;
    }
}
