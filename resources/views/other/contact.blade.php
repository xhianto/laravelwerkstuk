@extends('layouts.master')
@section('content')
    <h1 style="text-align: center">Neem contact op met een beheerder</h1>
    <form action="{{ route('sendEmail') }}" method="post">
        @csrf
        <div class="form-group row">
            <label for="naam" class="col-md-4 col-form-label text-md-right">{{ __('Naam') }}</label>
            <div class="col-md-6">
                <input id="naam" type="text" class="form-control @error('naam') is-invalid @enderror" name="naam" required autocomplete="name" autofocus
                @if(Auth::user())
                    value="{{Auth::user()->username}}" readonly
                @else
                    value="{{ old('naam') }}"
                @endif
                />
                @error('naam')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="naam" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" autofocus
                   @if(Auth::user())
                       value="{{Auth::user()->email}}" readonly
                   @else
                       value="{{ old('email') }}"
                    @endif
                />
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="onderwerp" class="col-md-4 col-form-label text-md-right">{{ __('Onderwerp') }}</label>
            <div class="col-md-6">
                <input id="onderwerp" type="text" class="form-control @error('onderwerp') is-invalid @enderror" name="onderwerp" value="{{ old('onderwerp') }}" required autocomplete="onderwerp" autofocus />
                @error('onderwerp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="naam" class="col-md-4 col-form-label text-md-right">{{ __('Bericht') }}</label>
            <div class="col-md-6">
                <textarea rows="6" cols="100" class="form-control @error('bericht') is-invalid @enderror" name="bericht" required autocomplete="bericht" autofocus>{{ old('bericht') }}</textarea>
                @error('bericht')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group" style="padding-left: 15px">
            <button type="submit" name="submit" value="submit" class="btn btn-primary offset-md-4">Verstuur</button>
        </div>
    </form>
@endsection
