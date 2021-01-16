@extends('layouts.master')
@section('content')
    <h1 class="text-center">Wil je {{ $item->title }} verwijderen?</h1>
    <div class="border-top row">

        <div class="col-9">
            <br />
            <h3>{{ $item->vraag }}</h3>
            <p>{{ $item->categorie }}</p>
            <p>{{ $item->antwoord }}</p>
        </div>
    </div>
    <form class="offset-3" action="{{ route('faqVerwijderen') }}" method="post">
        @csrf
        <input type="hidden" name="itemId" value="{{ $item->id }}">
        <button class="btn btn-primary" type="submit" name="keuze" value="verwijder">Verwijder</button>
        <button class="btn btn-primary" type="submit" name="keuze" value="annuleer">Annuleren</button>
    </form>

@endsection
