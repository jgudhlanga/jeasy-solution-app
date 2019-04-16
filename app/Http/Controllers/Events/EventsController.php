<?php

namespace App\Http\Controllers\Events;

use App\Http\Requests\Events\EventRequest;
use App\Modules\Events\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class EventsController extends Controller
{
    public function index(): View
    {
        $today = Carbon::today()->format('Y-m-d');
        $upComingEvents = Event::where('end_date', '>', $today)->orderBy('start_date', 'desc')->get();
        $pastEvents = Event::where('end_date', '<', $today)->orderBy('start_date', 'desc')->limit(3)->get();
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
        return;
    }
}
