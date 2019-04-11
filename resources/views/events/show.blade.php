@extends('html')

@section('content')
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
                    <a href="#" class="btn btn-light text-right"><< Back To List</a>
                </div>
            </div>
        </div>
    </div>
@endsection