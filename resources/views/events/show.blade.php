@extends('html')

@section('content')
    <div class="card mt-5">
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
    </div>
    <div id="map" class="mt-5"></div>
    <div class="table-responsive mt-5">
        <table class="table table-primary table-hover table-striped">
            <tbody>
            <tr><td>Start Date:</td><td>{{$event->start_date}}</td></tr>
            <tr><td>End Date:</td><td>{{$event->end_date}}</td></tr>
            <tr><td>Address:</td><td>{{$event->address}}</td></tr>
            <tr><td>Created By:</td><td>{{$event->creator->name}}</td></tr>
            <tr>
                <td colspan="2">
                    <div class="col-12 text-right">
                        <a href="{{route('events.index')}}" class="btn btn-outline-primary">
                            << Back To List
                        </a>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection