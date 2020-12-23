@extends('layouts.master')
@section('plugins')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

@endsection
@section('content')
    <div style="text-align: center">

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
    </div>
    <div style="text-align: center">

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
    </div>


    <h1 style="text-align: center">Nieuwe gebruiker toevoegen:</h1>

            <form method="POST" action="{{ route('beheerRegistreer') }}">
                @csrf

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
                    <label for="voornaam" class="col-md-4 col-form-label text-md-right">{{ __('Voornaam') }}</label>

                    <div class="col-md-6">
                        <input id="voornaam" type="text" class="form-control @error('voornaam') is-invalid @enderror" name="voornaam" value="{{ old('voornaam') }}" required autocomplete="voornaam" autofocus>

                        @error('voornaam')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="familienaam" class="col-md-4 col-form-label text-md-right">{{ __('Familienaam') }}</label>

                    <div class="col-md-6">
                        <input id="familienaam" type="text" class="form-control @error('familienaam') is-invalid @enderror" name="familienaam" value="{{ old('familienaam') }}" required autocomplete="familienaam" autofocus>

                        @error('familienaam')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="straat" class="col-md-4 col-form-label text-md-right">{{ __('Straat') }}</label>

                    <div class="col-md-6">
                        <input id="straat" type="text" class="form-control @error('straat') is-invalid @enderror" name="straat" value="{{ old('straat') }}" required autocomplete="straat" autofocus>

                        @error('straat')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="huisnummer" class="col-md-4 col-form-label text-md-right">{{ __('Huisnummer') }}</label>

                    <div class="col-md-6">
                        <input id="huisnummer" type="text" class="form-control @error('huisnummer') is-invalid @enderror" name="huisnummer" value="{{ old('huisnummer') }}" required autocomplete="huisnummer" autofocus>

                        @error('huisnummer')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="postcode" class="col-md-4 col-form-label text-md-right">{{ __('Postcode') }}</label>

                    <div class="col-md-6">
                        <input id="postcode" type="text" class="form-control @error('postcode') is-invalid @enderror" name="postcode" value="{{ old('postcode') }}" required autocomplete="postcode" autofocus>

                        @error('postcode')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="plaats" class="col-md-4 col-form-label text-md-right">{{ __('plaats') }}</label>

                    <div class="col-md-6">
                        <input id="plaats" type="text" class="form-control @error('plaats') is-invalid @enderror" name="plaats" value="{{ old('plaats') }}" required autocomplete="plaats" autofocus>

                        @error('plaats')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="geboortedatum" class="col-md-4 col-form-label text-md-right">{{ __('Geboortedatum ') }}</label>

                    <div class="col-md-6">
                        <input id="geboortedatum" type="text" class="datetimepicker form-control @error('geboortedatum') is-invalid @enderror" name="geboortedatum" value="{{ old('geboortedatum') }}" required autocomplete="geboortedatum" autofocus>
                        <script type="text/javascript">
                            $('.datetimepicker').datepicker({
                                format: 'dd/mm/yyyy'
                            });
                        </script>
                        @error('geboortedatum')
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
