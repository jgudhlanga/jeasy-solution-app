@extends('html')

@section('content')
    <div class="row">
        <div class="col-12 col-auto mt-5">
            <h3>Upcoming Events</h3>
            @forelse($upComingEvents as $event)
                <div class="card mb-2">
                    <div class="card-header">
                        <h4>{{$event->title}}</h4>
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
                            <div class="col-6 text-right">
                                <a href="#" class="btn btn-dark text-right">Read More >></a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
              <div class="text-warning text-center">No Upcoming Events</div>
            @endforelse
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-auto mt-5">
            <h3>Past Events</h3>
            @forelse($pastEvents as $event)
                <div class="card mb-2">
                    <div class="card-header">
                        <h4>{{$event->title}}</h4>
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
                            <div class="col-6 text-right">
                                <a href="#" class="btn btn-dark text-right">Read More >></a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-warning text-center"><h4>No Past Events</h4></div>
            @endforelse
        </div>
    </div>
@endsection