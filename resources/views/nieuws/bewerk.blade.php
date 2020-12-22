@extends('layouts.master')
@section('content')
    <form class="border-top row" action="{{ route('bewerk') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-3">
            <p>{{ $item->created_at }}</p>
            <img class="img-fluid" src="{{ $item->afbeelding }}" alt="afbeelding" style="max-height: 250px; width: auto ">
            <input type="file" name="image" />
        </div>
        <div class="col-9">
            <label>Titel:</label></br>
            <input name="title" value="{{ $item->title }}"/></br>
            <label>Bericht:</label></br>
            <textarea rows="4" cols="50" name="tekst">{{ $item->tekst }}</textarea>
        </div>
        <div class="offset-3">
            <input type="hidden" name="itemId" value="{{ $item->id }}">
            <button class="btn btn-secondary" type="submit" name="keuze" value="bewerk">Bewerk</button>
            <button class="btn btn-secondary" type="submit" name="keuze" value="annuleer">Annuleren</button>
        </div>
    </form>
@endsection
