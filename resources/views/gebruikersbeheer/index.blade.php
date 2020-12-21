@extends('layouts.master')
@section('content')
    <h1>Beheerder gebruiker maken:</h1>
    <form action="{{ route('beheerderNaarGebruiker') }}" method="post">
        @csrf
        <select class="btn border-secondary" name="beheerder" id="beheerder">
            <option value="0" disabled="true" selected>{{ __('---Selecteer een beheerder---') }}</option>
            @foreach($beheerders as $beheerder)
                <option value="{{ $beheerder->id }}"
                @if(Auth::User()->id == $beheerder->id)
                    disabled
                @endif
                >{{ $beheerder->username }}</option>
            @endforeach
        </select>
        <button type="submit" name="submit" value="submit" class="btn btn-secondary">Beheerder gebruiker maken</button>
    </form>
    <h1>Gebruiker beheerder maken:</h1>
    <form action="{{ route('gebruikerNaarBeheerder') }}" method="post">
        @csrf
        <select class="btn border-secondary" name="gebruiker" id="gebruiker">
            <option value="0" disabled="true" selected>{{ __('---Selecteer een gebruiker---') }}</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->username }}</option>
            @endforeach
        </select>
        <button type="submit" name="submit" value="submit" class="btn btn-secondary">Gebruiker beheerder maken</button>
    </form>


    <h1>Nieuwe gebruiker toevoegen:</h1>

            <form method="POST" action="{{ route('beheerRegistreer') }}">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>

                    <div class="col-md-6">
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                        @error('username')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>
                <div class="form-group offset-md-4" style="padding-left: 15px">

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="soortGebruiker" id="soortGebruiker1" value="2" checked>
                    <label class="form-check-label" for="soortGebruiker1">
                        Gebruiker
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="soortGebruiker" id="soortgebruiker2" value="1">
                    <label class="form-check-label" for="soortgebruiker2">
                        Beheerder
                    </label>
                </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-secondary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
@endsection
