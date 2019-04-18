<?php

namespace App\Http\Controllers\Events;

use App\Http\Requests\Events\EventRequest;
use App\Modules\Events\Event;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
        $event = Event::create([
            'title' => $request->input('title'),
            'slug' => \Illuminate\Support\Str::slug($request->input('title')).'-'.uniqid(time()),
            'address' => $request->input('address'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'description' => $request->input('description'),
            'long' => $request->input('long'),
            'lat' => $request->input('lat'),
            'user_id' => Auth::user()->id
        ]);

        return redirect(route('events.show', [$event->id]));
    }
}
