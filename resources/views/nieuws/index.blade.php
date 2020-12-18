@extends('layouts.master')
@section('content')
    <h1>Laatste nieuws</h1>
    @foreach($nieuwsItems as $item)
        <div class="border-top row">
            <div class="col-4">
                <p>Hier komt afbeelding</p>
                <p>{{ $item->afbeeldingurl }}</p>
            </div>
            <div class="col-8">
                <span class="row">
                    <h3 class="ml-2">{{ $item->title }}</h3>
                    <p class="ml-auto">{{ $item->created_at }}</p>
                </span>
                <p>{{ $item->tekst }}</p>
            </div>
            @if(Auth::user())
                @if(Auth::user()->hasRole('admin'))
                    <form action="{{ route('bewerkverwijder') }}" method="post">
                        @csrf
                        <input type="hidden" name="nieuwsItem" value="{{ $item->id }}">
                        <button class="btn btn-secondary" type="submit" name="keuze" value="bewerk">Bewerk</button>
                        <button class="btn btn-secondary" type="submit" name="keuze" value="verwijder">Verwijder</button>
                    </form>
                @endif
            @endif
        </div>
    @endforeach
    @if(Auth::user())
        <h2>Dit kan een ingelogde zien</h2>
        @if(Auth::user()->hasRole('admin'))
            <h2>Alleen admin zou dit moeten zien</h2>
            <form action="{{ route('nieuws') }}" method="post">
                @csrf
                <div class="form-group row">
                    <label id="title" class="col-sm-3 col-form-label">Titel: </label>
                    <input type="text" class="form-control col-sm-6" name="title" />
                </div>
                <div class="form-group row">
                    <label id="tekst" class="col-sm-3 col-form-label">Bericht: </label>
                    <textarea rows="4" cols="50" class="form-control col-sm-6" name="tekst"></textarea>
                </div>
                <div>
                    <p class="offset-sm-3">Hier moet nog een optie komen voor plaatje toevoegen</p>
                </div>
                <button type="submit" name="submit" value="submit" class="btn btn-primary offset-sm-3">Submit</button>
            </form>
        @endif
    @endif

@endsection
