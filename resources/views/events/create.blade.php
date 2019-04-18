@extends('layouts.html')

@section('content')
    <form action="{{ route('events.store') }}" method="POST" id="locationForm">
        {{ csrf_field() }}
        {{ method_field('POST') }}
        <div class="row">
            <div class="col-12 text-right mt-5">
                <a href="{{route('events.index')}}" class="btn btn-outline-primary">
                    << Back To List
                </a>
            </div>
        </div>
        <div class="card mt-5">
            <div class="card-header">
                <h4>Add New Event</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="title">{{ __('Title') }}</label>
                            <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title"  id="title" placeholder="Event Title">
                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="address">{{ __('Address') }}</label>
                            <input type="text" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" name="address"  id="address" placeholder="Event Address">
                            @if ($errors->has('address'))
                                <span class="invalid-feedback" role="alert">{{ $errors->first('address') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="start_date">{{ __('Start Date') }}</label>
                            <input type="date" class="form-control {{ $errors->has('start_date') ? ' is-invalid' : '' }}" name="start_date"  id="start_date" placeholder="Start Date">
                            @if ($errors->has('start_date'))
                                <span class="invalid-feedback" role="alert">{{ $errors->first('start_date') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="end_date">{{ __('End Date') }}</label>
                            <input type="date" class="form-control {{ $errors->has('end_date') ? ' is-invalid' : '' }}" name="end_date"  id="end_date" placeholder="End Date">
                            @if ($errors->has('end_date'))
                                <span class="invalid-feedback" role="alert">{{ $errors->first('end_date') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description">{{ __('Description') }}</label>
                            <textarea class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description"  id="description" placeholder="Description"></textarea>
                            @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-6">
                        <h5 class="text-center">Select a location</h5>
                        <div class="form-group">
                            <event-location></event-location>
                            @if ($errors->has('long'))
                                <span class="invalid-feedback" role="alert">{{ $errors->first('long') }}</span>
                            @endif
                            @if ($errors->has('lat'))
                                <span class="invalid-feedback" role="alert">{{ $errors->first('lat') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                <button class="btn btn-lg btn-success" type="submit">Save</button>
            </div>
        </div>
    </form>
@endsection
@section('footer-scripts')
    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
    <script>
       // CKEDITOR.replace('description');
    </script>
@endsection



