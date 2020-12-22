@extends('layouts.master')
@section('content')
    <h1>Laatste nieuws</h1>
    @foreach($nieuwsItems as $item)
        <div class="border-top row" style="margin-bottom: 20px">
            <div class="col-3">
                <text style="color: #aaa">{{ $item->created_at }}</text>
                <img class="img-fluid" src="{{ $item->afbeelding }}" alt="afbeelding" style="max-height: 250px; width: auto ">
            </div>
            <div class="col-9">
                <h3 style="margin-top: 20px">{{ $item->title }}</h3>
                <p>{{ $item->tekst }}</p>
            </div>
            @if(Auth::user())
                @if(Auth::user()->hasRole('admin'))
                    <form class="offset-3" action="{{ route('bewerkverwijder') }}" method="post">
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
            <form action="{{ route('nieuws') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label id="title" class="col-sm-3 col-form-label">Titel: </label>
                    <input type="text" class="form-control col-sm-6" name="title" />
                </div>
                <div class="form-group row">
                    <label id="tekst" class="col-sm-3 col-form-label">Bericht: </label>
                    <textarea rows="4" cols="50" class="form-control col-sm-6" name="tekst"></textarea>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="image">Afbeelding: </label>
                    <input class="col-sm-6" type="file" name="image" />
{{--                    <input class="offset-sm-3" type="file" name="image" />--}}
                </div>
                <button type="submit" name="submit" value="submit" class="btn btn-primary offset-sm-3">Submit</button>
            </form>
        @endif
    @endif

@endsection
