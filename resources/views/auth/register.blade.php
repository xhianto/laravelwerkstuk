{{-- @extends('layouts.app') --}}
@extends('layouts.master')
@section('plugins')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
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
{{--                                <input id="geboortedatum" type="date" class="form-control @error('geboortedatum') is-invalid @enderror" name="geboortedatum" value="{{ old('geboortedatum') }}" required autocomplete="geboortedatum" autofocus>--}}
                                {{--                                <div class="row">--}}
                                {{--                                <input type="number" id="dag" class="form-control col-md-3" name="dag" value="{{ old('dag') }}" required autocomplete="dag" />--}}
                                {{--                                <input type="number" id="maand" class="form-control col-md-3" name="maand" value="{{ old('maand') }}" required autocomplete="maand" />--}}
                                {{--                                <input type="number" id="jaar" class="form-control col-md-4" name="jaar" value="{{ old('jaar') }}" required autocomplete="jaar" />--}}
                                {{--                                </div>--}}
                                <input id="geboortedatum" type="text" class="datepicker form-control @error('geboortedatum') is-invalid @enderror" name="geboortedatum" value="{{ old('geboortedatum') }}" required autocomplete="geboortedatum" autofocus>
                                <script type="text/javascript">
                                    $('.datepicker').datepicker({
                                        format: 'dd-mm-yyyy'
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

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
