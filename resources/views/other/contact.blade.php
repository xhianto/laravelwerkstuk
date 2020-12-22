@extends('layouts.master')
@section('content')
    <h1 style="text-align: center">Neem contact op met een beheerder</h1>
    <form action="{{ route('sendEmail') }}" method="post">
        @csrf
        <div class="form-group row">
            <label for="naam" class="col-md-4 col-form-label text-md-right">Naam:</label>
            <div class="col-md-6">
                <input id="naam" type="text" class="form-control" name="naam" required
                @if(Auth::user())
                    value="{{Auth::user()->username}}" readonly
                @endif
                />
            </div>
        </div>
        <div class="form-group row">
            <label for="naam" class="col-md-4 col-form-label text-md-right">Email:</label>
            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" required
                   @if(Auth::user())
                       value="{{Auth::user()->email}}" readonly
                    @endif
                />
            </div>
        </div>
        <div class="form-group row">
            <label for="onderwerp" class="col-md-4 col-form-label text-md-right">Onderwerp:</label>
            <div class="col-md-6">
                <input id="onderwerp" type="text" class="form-control" name="onderwerp" required />
            </div>
        </div>
        <div class="form-group row">
            <label for="naam" class="col-md-4 col-form-label text-md-right">Bericht:</label>
            <div class="col-md-6">
                <textarea rows="6" cols="100" class="form-control" name="bericht"></textarea>
            </div>
        </div>
        <div class="form-group" style="padding-left: 15px">
            <button type="submit" name="submit" value="submit" class="btn btn-primary offset-md-4">Verstuur</button>
        </div>
    </form>
@endsection
