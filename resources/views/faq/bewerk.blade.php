@extends('layouts.master')
@section('content')
    <form action="{{ route('faqBewerken') }}" method="post">
        @csrf
        <div class="form-group row">
            <label id="categorie" class="col-sm-3 col-form-label">Categorie </label>
            <input type="text" class="form-control col-sm-6 @error('categorie') is-invalid @enderror" name="categorie" @if(old('categorie') != null) value="{{ old('categorie') }}"@else value="{{ $item->categorie }}"@endif required autocomplete="categorie" autofocus />
            @error('categorie')
            <span class="offset-sm-3 invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group row">
            <label id="vraag" class="col-sm-3 col-form-label">Vraag </label>
            <input type="text" class="form-control col-sm-6 @error('vraag') is-invalid @enderror" name="vraag" @if(old('vraag') != null) value="{{ old('vraag') }}"@else value="{{ $item->vraag }}"@endif required autocomplete="vraag" autofocus />
            @error('vraag')
            <span class="offset-sm-3 invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group row">
            <label id="tekst" class="col-sm-3 col-form-label">Bericht </label>
            <textarea rows="4" cols="50" class="form-control col-sm-6 @error('antwoord') is-invalid @enderror" name="antwoord" required autocomplete="antwoord" autofocus>@if(old('antwoord') != null) {{ old('antwoord') }} @else {{ $item->antwoord }}@endif</textarea>
            @error('antwoord')
            <span class="offset-sm-3 invalid-feedback" role="alert">
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
