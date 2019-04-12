@extends('html')

@section('content')
    <div class="row">
        <div class="col-12 col-auto mt-5">
            <h3>Upcoming Events</h3>
            @forelse($upComingEvents as $event)
                <div class="card mb-2">
                    <div class="card-header">
                        <a href="{{ route('events.show', [$event->id]) }}" class="card-link">
                            <h4>{{$event->title}}</h4>
                        </a>
                        <div>
                            <small>{{$event->address}}</small>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $event->description }}</p>
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
                        <a href="{{ route('events.show', [$event->id]) }}" class="card-link">
                            <h4>{{$event->title}}</h4>
                        </a>
                        <div>
                            <small>{{$event->address}}</small>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $event->description }}</p>
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