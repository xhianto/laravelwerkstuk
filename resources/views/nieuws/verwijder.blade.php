@extends('layouts.master')
@section('content')
    <h1 class="text-center">Wil je {{ $item->title }} verwijderen?</h1>
    <div class="border-top row">
        <div class="col-4">
            <p>Hier komt afbeelding</p>
            <p>{{ $item->afbeeldinguri }}</p>
        </div>
        <div class="col-8">
            <span class="row">
                <h3 class="ml-2">{{ $item->title }}</h3>
                <p class="ml-auto">{{ $item->created_at }}</p>
            </span>
            <p>{{ $item->tekst }}</p>
        </div>
    </div>
    <form action="{{ route('verwijder') }}" method="post">
        @csrf
        <input type="hidden" name="itemId" value="{{ $item->id }}">
        <button class="btn btn-primary" type="submit" name="keuze" value="verwijder">Verwijder</button>
        <button class="btn btn-primary" type="submit" name="keuze" value="annuleer">Annuleren</button>
    </form>

@endsection
