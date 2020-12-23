@extends('layouts.master')
@section('content')
    <form class="border-top row" action="{{ route('bewerken') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-3">
            <p>{{ $item->created_at }}</p>
            <img class="img-fluid" src="{{ $item->afbeelding }}" alt="afbeelding" style="max-height: 250px; width: auto ">
            <input type="file" name="image" />
        </div>
        <div class="col-9">
            <label>Titel:</label><br/>
            <input name="title" @if(old('title') != null)value="{{ old('title') }}"@else value="{{ $item->title }}"@endif class="@error('title') is-invalid @enderror" required autocomplete="title" autofocus /><br/>
            @error('title')
                <span class="invalid-feedback" role="alert"><br/>
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <label>Bericht:</label><br/>
            <textarea rows="4" cols="50" name="tekst" class="@error('tekst') is-invalid @enderror" required autocomplete="tekst" autofocus>@if(old('tekst') != null){{ old('tekst') }}@else{{ $item->tekst }}@endif</textarea>
            @error('tekst')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="offset-3">
            <input type="hidden" name="itemId" value="{{ $item->id }}">
            <button class="btn btn-secondary" type="submit" name="keuze" value="bewerk">Bewerk</button>
            <button class="btn btn-secondary" type="submit" name="keuze" value="annuleer">Annuleren</button>
        </div>
    </form>
@endsection
