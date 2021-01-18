@extends('layouts.master')
@section('plugins')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
@endsection
@section('content')
    <h1 style="text-align: center">Profiel van {{ $user->username }}</h1>
    <form class="row" action="{{ route('profielopslaan', ['username' => Auth::user()->username]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="offset-md-2 col-md-3 border-right">
                <div style="text-align: center">
            <img class="img-fluid" src="{{ $user->avatar }}" alt="avatar" style="max-height: 250px; width: auto;">
            @if (Auth::user() == $user)
                <div>
                    <label for="avatar" class="btn border-secondary" style="margin: 3px 0">Avatar veranderen</label>
                    <input id="avatar" hidden type="file" name="avatar">
                </div>
            @endif
                </div>
            <h1>{{ $user->username }}</h1>
            <p>{{ $user->voornaam }} {{ $user->familienaam }}</p>
            <p>{{ $user->email }}</p>
            <a href="{{ route('reserveringen', ['username' => $user->username]) }}" class="btn border-secondary">Lijst van reservatie</a>
        </div>

        <div class="col-md-5 border-left">
            @if (Auth::user() == $user)
                <div class="form-group">
                    <h3 style="text-align: center;">Vertel iets over jezelf: </h3>
                    <textarea rows="4" type="text" id="biografie" name="biografie" style="width: 100%">{{ $user->biografie }}</textarea>
                </div>
                <div class="form-group row">
                    <label for="straat" class="col-md-4 col-form-label">Straat: </label>
                    <input type="text" id="straat" class="col-md-8 form-control @error('straat') is-invalid @enderror" name="straat"
                        @if (old('straat') != null)
                            value="{{ old('straat') }}"
                        @else
                            value="{{ $user->straat }}"
                        @endif
                        required autocomplete="straat"/>
                    @error('straat')
                    <span class="offset-md-4 invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="huisnummer" class="col-sm-4 col-form-label">Huisnummer: </label>
                    <input type="text" id="huisnummer" class="col-md-8 form-control @error('huisnummer') is-invalid @enderror" name="huisnummer"
                        @if (old('huisnummer') != null)
                            value="{{ old('huisnummer') }}"
                        @else
                            value="{{ $user->huisnummer }}"
                        @endif
                        required autocomplete="huisnummer" />
                    @error('huisnummer')
                        <span class="offset-md-4 invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="postcode" class="col-md-4 col-form-label">Postcode: </label>
                    <input type="text" id="postcode" class="col-md-8 form-control @error('postcode') is-invalid @enderror" name="postcode"
                        @if(old('postcode') != null)
                            value="{{ old('postcode') }}"
                        @else
                            value="{{ $user->postcode }}"
                        @endif
                        required autocomplete="postcode" />
                    @error('postcode')
                        <span class="offset-md-4 invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="plaats" class="col-md-4 col-form-label">Plaats: </label>
                    <input type="text" id="plaats" class="col-md-8 form-control @error('plaats') is-invalid @enderror" name="plaats"
                        @if(old('plaats') != null)
                            value="{{ old('plaats') }}"
                        @else
                            value="{{ $user->plaats }}"
                        @endif
                        required autocomplete="plaats" />
                    @error('plaats')
                        <span class="offset-md-4 invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="geboortedatum" class="col-md-4 col-form-label">Geboortedatum: </label>
                    <input type="text" id="geboortedatum" class="datepicker col-md-8 form-control @error('geboortedatum') is-invalid @enderror" name="geboortedatum"
                        @if(old('geboortedatum') != null)
                            value="{{ old('geboortedatum') }}"
                        @else
                            value="{{ date('d/m/Y', strtotime($user->geboortedatum)) }}"
                        @endif
                        required autocomplete="plaats" />
                    <script type="text/javascript">
                        $('.datepicker').datepicker({
                            format: 'dd/mm/yyyy'
                        });
                    </script>
                    @error('geboortedatum')
                        <span class="offset-md-4 invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="oldpassword" class="col-md-4 col-form-label">Oude password: </label>
                    <input type="password" id="oldpassword" class="col-md-8 form-control @error('oldpassword') is-invalid @enderror" name="oldpassword" autocomplete="oldpassword" />
                    @error('oldpassword')
                    <span class="offset-md-4 invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label">Password: </label>
                    <input type="password" id="password" class="col-md-8 form-control @error('password') is-invalid @enderror" name="password" autocomplete="password" />
                    @error('password')
                        <span class="offset-md-4 invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="password_confirmation" class="col-md-4 col-form-label">Bevestig Password: </label>
                    <input type="password" id="password_confirmation" class="col-md-8 form-control" name="password_confirmation" />
                </div>
                <div class="form-group row" style="text-align: center">
                    <button class="offset-md-4 btn btn-secondary" type="submit" class="btn btn-primary">
                        {{ __('Opslaan') }}
                    </button>
                </div>
            @else
                <div class="form-group">
                    <h3 style="text-align: center;">Iets over {{ $user->username }}: </h3>
                    <p class="col-form-label" id="biografie" style="text-align: center">
                        @if($user->biografie == null)
                            <i>Gebruiker heeft nog niets geschreven over zichzelf</i>
                        @else
                            {{ $user->biografie }}
                        @endif
                    </p>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label">Straat: </label>
                    <label class="col-md-8 col-form-label">{{ $user->straat }}</label>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label">Huisnummer: </label>
                    <label class="col-md-8 col-form-label">{{ $user->huisnummer }}</label>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label">Postcode: </label>
                    <label class="col-md-8 col-form-label">{{ $user->postcode }}</label>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label">Plaats: </label>
                    <label class="col-md-8 col-form-label">{{ $user->plaats }}</label>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label">Geboortedatum: </label>
                    <label class="col-md-8 col-form-label">{{ date('d-m-Y', strtotime($user->geboortedatum)) }}</label>
                </div>
            @endif
        </div>
    </form>
@endsection
