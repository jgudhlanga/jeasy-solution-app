@extends('layouts.html')

@section('content')
    <div class="row">
        <div class="col-12 text-right mt-5">
            <a href="{{route('events.index')}}" class="btn btn-outline-primary">
                << Back To List
            </a>
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-header">
            <h4>{{$event->title}}</h4>
            <div>
                <small>{{$event->address}}</small>
            </div>
        </div>
        <div class="card-body">
            <p class="card-text">{!! $event->description !!}</p>
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
        <table class="table table-primary table-hover table-striped table-bordered">
            <tbody>
            <tr><td>Start Date:</td><td>{{$event->start_date}}</td></tr>
            <tr><td>End Date:</td><td>{{$event->end_date}}</td></tr>
            <tr><td>Address:</td><td>{{$event->address}}</td></tr>
            <tr><td>Created By:</td><td><a href="">{{$event->creator->name}}</a></td></tr>
            </tbody>
        </table>
    </div>
@endsection
@section('styles')
<style>
    #map{
        height: 480px;
        width: 100%
    }
</style>
@endsection
@section('header-scripts')
    <script src="http://js.api.here.com/v3/3.0/mapsjs-core.js" type="text/javascript" charset="utf-8"></script>
    <script src="http://js.api.here.com/v3/3.0/mapsjs-service.js" type="text/javascript" charset="utf-8"></script>
@endsection
@section('footer-scripts')
    <script>
       function initMap() {
           var uluru = {lat: {{$event->lat}}, lng: {{$event->long}}};
           var map = new google.maps.Map(document.getElementById('map'), {
               zoom: 4,
               center: uluru
           });
           var marker = new google.maps.Marker({
               position: uluru,
               map: map
           })
       }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_API_KEY')}}&callback=initMap"></script>
@endsection

