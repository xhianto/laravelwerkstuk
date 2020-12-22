@extends('layouts.master')
@section('content')
    <h1 class="text-center">Wil je {{ $item->title }} verwijderen?</h1>
    <div class="border-top row">
        <div class="col-3">
            <p>{{ $item->created_at }}</p>
            <img class="img-fluid" src="{{ $item->afbeelding }}" alt="afbeelding" style="max-height: 250px; width: auto ">
        </div>
        <div class="col-9">
            <br />
            <h3>{{ $item->title }}</h3>
            <p>{{ $item->tekst }}</p>
        </div>
    </div>
    <form class="offset-3" action="{{ route('verwijder') }}" method="post">
        @csrf
        <input type="hidden" name="itemId" value="{{ $item->id }}">
        <button class="btn btn-primary" type="submit" name="keuze" value="verwijder">Verwijder</button>
        <button class="btn btn-primary" type="submit" name="keuze" value="annuleer">Annuleren</button>
    </form>

@endsection
