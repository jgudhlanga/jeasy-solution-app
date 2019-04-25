@extends('layouts.html')

@section('content')
    <form action="{{ route('profile.update') }}" method="POST" id="profileForm">
        {{ csrf_field() }}
        {{ method_field('POST') }}
        <div class="col ml-auto">
            <div class="card mt-5">
                <div class="card-header">
                    <h4>Edit My Profile</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name">{{ __('Name') }}</label>
                                <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"  id="name" value="{{ old('name', $user->name) }}">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email">{{ __('Address') }}</label>
                                <input type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" disabled id="email" value="{{ $user->email }}">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-lg btn-success" type="submit">Save</button>
                </div>
            </div>
        </div>
    </form>
@endsection