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
                    <label for="avatar" class="btn border-secondary" style="margin: 3px 0px">Avatar veranderen</label>
                    <input id="avatar" hidden type="file" name="avatar">
                </div>
            @endif
                </div>
            <h1>{{ $user->username }}</h1>
            <p>{{ $user->voornaam }} {{ $user->familienaam }}</p>
            <p>{{ $user->email }}</p>
        </div>

        <div class="col-md-5 border-left">
            @if (Auth::user() == $user)
                <div class="form-group">
                    <h3 style="text-align: center;">Vertel iets over jezelf: </h3>
                    <textarea rows="4" type="text" id="biografie" name="biografie" style="width: 100%">{{ $user->biografie }}</textarea>
                </div>
                <div class="form-group row">
                    <label for="straat" class="col-md-4 col-form-label">Straat: </label>
                    <input type="text" id="straat" class="col-md-8 form-control" name="straat" value="{{ $user->straat }}" />
                </div>
                <div class="form-group row">
                    <label for="huisnummer" class="col-sm-4 col-form-label">Huisnummer: </label>
                    <input type="text" id="huisnummer" class="col-md-8 form-control" name="huisnummer" value="{{ $user->huisnummer }}" />
                </div>
                <div class="form-group row">
                    <label for="postcode" class="col-md-4 col-form-label">Postcode: </label>
                    <input type="text" id="postcode" class="col-md-8 form-control" name="postcode" value="{{ $user->postcode }}" />
                </div>
                <div class="form-group row">
                    <label for="plaats" class="col-md-4 col-form-label">Plaats: </label>
                    <input type="text" id="plaats" class="col-md-8 form-control" name="plaats" value="{{ $user->plaats }}" />
                </div>
                <div class="form-group row">
                    <label for="geboortedatum" class="col-md-4 col-form-label">Geboortedatum: </label>
                    <input type="text" id="geboortedatum" class="datepicker col-md-8 form-control" name="geboortedatum" value="{{ date('d-m-Y', strtotime($user->geboortedatum)) }}" />
                    <script type="text/javascript">
                        $('.datepicker').datepicker({
                            format: 'dd-mm-yyyy'
                        });
                    </script>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label">Password: </label>
                    <input type="password" id="password" class="col-md-8 form-control" name="password" />
                </div>
                <div class="form-group row">
                    <label for="bevestigPassword" class="col-md-4 col-form-label">Bevestig Password: </label>
                    <input type="password" id="bevestigPassword" class="col-md-8 form-control" name="bevestigPassword" />
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
