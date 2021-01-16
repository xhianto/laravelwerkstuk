@extends('layouts.master')
@section('content')
    <h1>FAQ</h1>
    @if(Auth::user())
        @if(Auth::user()->hasRole('admin'))
            <a href="{{ route('nieuweFaq' )}}" class="btn btn-secondary">FAQ aanmaken</a>
        @endif
    @endif
    <form action="{{ route('faqCategorie') }}" method="post">
        @csrf
        <select class="btn border-secondary" onchange="submit();" name="categorie">
            <option>--Kies een categorie--</option>
            @foreach ($categories as $categorie)
                <option value="{{ $categorie }}">{{$categorie}}</option>
            @endforeach
        </select>
    </form>
    @if ($faqs != null)
        @foreach ($faqs as $faq)
            <hr>
            <h3>{{ $faq->vraag }}</h3>
            <p>{{ $faq->antwoord }}</p>
            @if(Auth::user())
                @if(Auth::user()->hasRole('admin'))
                    <form class="offset-3" action="{{ route('faqbewerkverwijder') }}" method="post">
                        @csrf
                        <input type="hidden" name="faqItem" value="{{ $faq->id }}">
                        <button class="btn btn-secondary" type="submit" name="keuze" value="bewerk">Bewerk</button>
                        <button class="btn btn-secondary" type="submit" name="keuze" value="verwijder">Verwijder</button>
                    </form>
                @endif
            @endif
        @endforeach
    @endif

@endsection

