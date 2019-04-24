@extends('layouts.html')

@section('content')
    <div class="row">
        <div class="col-12 col-auto mt-5">
            <h3>Upcoming Events</h3>
            @forelse($upComingEvents as $event)
                <div class="card mb-2">
                    <div class="card-header">
                        <a href="{{ route('events.show', [$event->slug]) }}" class="card-link">
                            <h4>{{$event->title}}</h4>
                        </a>
                        <div>
                            <small>{{$event->address}}</small>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{!! limit_words($event->description, 50) !!}</p>
                        <div class="row">
                            <div class="col-6 text-left">
                                <small class="text-muted">Start Date: {{$event->start_date}}</small>
                            </div>
                            <div class="col-6 text-right">
                                <small class="text-muted">End Date: {{$event->end_date}}</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-6 text-left">
                                <small>By: {{$event->creator->name}}</small>
                            </div>
                            <div class="col-6 text-right">
                                @if($event->user === null)
                                    <event-registration
                                        text="Register"
                                        mode="btn-success"
                                        event-id="{{ $event->id }}"
                                    ></event-registration>
                                @else
                                    <event-registration
                                            text="De-Register"
                                            mode="btn-warning"
                                            event-id="{{ $event->id }}"
                                    ></event-registration>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
              <div class="text-danger">No Upcoming Events</div>
            @endforelse
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-auto mt-5">
            <h3>Past Events</h3>
            @forelse($pastEvents as $event)
                <div class="card mb-2">
                    <div class="card-header">
                        <a href="{{ route('events.show', [$event->slug]) }}" class="card-link">
                            <h4>{{$event->title}}</h4>
                        </a>
                        <div>
                            <small>{{$event->address}}</small>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{!! limit_words($event->description) !!}</p>
                        <div class="row">
                            <div class="col-6 text-left">
                                <small class="text-muted">Start Date: {{$event->start_date}}</small>
                            </div>
                            <div class="col-6 text-right">
                                <small class="text-muted">End Date: {{$event->end_date}}</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-6 text-left">
                                <small>By: {{$event->creator->name}}</small>
                            </div>
                            <div class="col-6 text-right"></div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-danger">No Past Events</div>
            @endforelse
        </div>
    </div>
@endsection