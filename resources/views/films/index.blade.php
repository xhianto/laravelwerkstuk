@extends('layouts.master')
@section('content')
    <h1>Films die momenteel draaien</h1>
    @foreach ($films as $film)
        <div class="border-top row" style="margin-bottom: 20px">
            <div class="col-3">
                <img class="img-fluid" src="{{ $film->afbeelding }}" alt="afbeelding" style="max-height: 250px; width: auto ">
            </div>
            <div class="col-9">
                <h3 style="margin-top: 20px">{{ $film->title }}</h3>
                <p>{{ $film->beschrijving }}</p>
            </div>
            <a class="offset-3 btn btn-primary" href="{{ route('voorstelling', ['id' => $film->id]) }}">Kaarten Bestellen</a>
{{--                <form class="offset-3" action="{{ route('voorstellingen') }}" method="post">--}}
{{--                    @csrf--}}
{{--                    <input type="hidden" name="filmId" value="{{ $film->id }}">--}}
{{--                    <button class="btn btn-primary" type="submit" name="keuze" value="Tickets bestellen">Tickets bestellen</button>--}}
{{--                </form>--}}
        </div>
    @endforeach
@endsection
