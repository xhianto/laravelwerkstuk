@extends('layouts.master')
@section('content')
    <form class="border-top row" action="{{ route('bewerk') }}" method="post">
        @csrf
        <div class="col-4">
            <p>Hier komt afbeelding</p>
            <p>{{ $item->afbeeldingurl }}</p>
        </div>
        <div class="col-6">
            <label>Titel:</label></br>
            <input name="title" value="{{ $item->title }}"/></br>
            <label>Bericht:</label></br>
            <textarea rows="4" cols="50" name="tekst">{{ $item->tekst }}</textarea>
        </div>
        <div class="col-2">
            <p class="ml-auto">{{ $item->created_at }}</p>
        </div>
        <div>
            <input type="hidden" name="itemId" value="{{ $item->id }}">
            <button class="btn btn-secondary" type="submit" name="keuze" value="bewerk">Bewerk</button>
            <button class="btn btn-secondary" type="submit" name="keuze" value="annuleer">Annuleren</button>
        </div>
    </form>
@endsection
