<?php

namespace App\Modules\Events\Http;

use App\Http\Controllers\Controller;
use App\Modules\Events\Http\Requests\EventRequest;
use App\Modules\Events\Models\Event;
use App\Modules\Events\Repositories\EventRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

class EventsController extends Controller
{
    protected $eventRepository;

    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function index(): View
    {
        $upComingEvents = $this->eventRepository->getUpcomingEvents();
        $pastEvents = $this->eventRepository->getPastEvents();
        return view('events.index', compact('upComingEvents', 'pastEvents'));
    }

    public function show(Event $event): View
    {
        return view('events.show', compact('event'));
    }

    public function create(): View
    {
        return view('events.create');
    }

    public function store(EventRequest $request)
    {
        $slug = Str::slug($request->input('title') . '-' . uniqid(time()));
        $event = Event::create([
            'title' => $request->input('title'),
            'slug' => $request->input('slug', $slug),
            'address' => $request->input('address'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'description' => $request->input('description'),
            'long' => $request->input('long'),
            'lat' => $request->input('lat'),
            'user_id' => Auth::user()->id
        ]);

        return redirect(route('events.show', [$event->slug]));
    }
}
