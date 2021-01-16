@extends('layouts.master')
@section('content')
    <h1>Nieuwe FAQ aanmaken</h1>
    <hr>
    <form action="{{ route('faqAanmaken') }}" method="post">
        @csrf
        <div class="form-group row">
            <label id="categorie" class="col-sm-3 col-form-label">Categorie </label>
            <input type="text" class="form-control col-sm-6 @error('categorie') is-invalid @enderror" name="categorie" value="{{ old('categorie') }}" required autocomplete="categorie" autofocus />
            @error('categorie')
            <span class="offset-sm-3 invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group row">
            <label id="vraag" class="col-sm-3 col-form-label">Vraag </label>
            <input type="text" class="form-control col-sm-6 @error('vraag') is-invalid @enderror" name="vraag" value="{{ old('vraag') }}" required autocomplete="vraag" autofocus />
            @error('vraag')
                <span class="offset-sm-3 invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group row">
            <label id="tekst" class="col-sm-3 col-form-label">Bericht </label>
            <textarea rows="4" cols="50" class="form-control col-sm-6 @error('antwoord') is-invalid @enderror" name="antwoord" required autocomplete="antwoord" autofocus>{{ old('antwoord') }}</textarea>
            @error('antwoord')
                <span class="offset-sm-3 invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button type="submit" name="submit" value="submit" class="btn btn-primary offset-sm-3">Submit</button>
    </form>
@endsection
