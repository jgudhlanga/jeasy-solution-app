<?php


namespace App\Modules\Events\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\Events\Models\Participant;
use App\Modules\Events\Repositories\EventRepository;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    protected $event;

    public function __construct(EventRepository $eventRepository)
    {
        $this->event = $eventRepository;
    }

    public function handleRegistration(Request $request)
    {
        $user = $request->user();
        $event = $this->event->getById($request->input('eventId'));

        $participant = Participant::where('user_id', $user->id)
            ->where('event_id', $event->id)
            ->first();
        if (!$participant) {
            $this->event->registerForEvent($event);
            return response(['message' => 'Registered'], 201);
        }

        $this->event->deRegisterFromEvent($event);
        return response(['message' => 'De-Registered'], 200);
    }
}
