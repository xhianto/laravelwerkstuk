@extends('layouts.master')
@section('content')
    <h1>Winkelmand</h1>
    @if ($winkelmand == null)
        <h2 class="alert alert-danger">Je winkelmand is leeg</h2>
    @else
    <table class="table">
        <tr>
            <th>Film</th>
            <th>Datum</th>
            <th>Tijd</th>
            <th>Prijs</th>
            <th>Aantal</th>
            <th>Totaal</th>
        </tr>
        @foreach ($winkelmand as $item)
            <tr>
                <td>{{ $item[0]->film->title }}</td>
                <td>{{ date('d/m/Y', strtotime($item[0]->tijd)) }}</td>
                <td>{{ date('H:i', strtotime($item[0]->tijd)) }}</td>
                <td>{{ $item[0]->prijs }}</td>
                <td>{{ $item[1] }}</td>
                <td>{{ $item[0]->prijs * $item[1] }}</td>
            </tr>
        @endforeach
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <th>Totaal:</th>
            <td>{{ $totaal }}</td>
        </tr>
    </table>
    <form action="{{ route('afhandelen') }}" method="post">
        @csrf
        <div class="float-right">
            <button class="btn btn-secondary" type="submit" name="keuze" value="winkelwagenlegen">Winkelwagen legen</button>
            @if (Auth::user())
                <input type="hidden" name="user" value="{{ Auth::user()->id }}">
                <button class="btn btn-secondary" type="submit" name="keuze" value="afrekenen">Afrekenen</button>
            @else
                <a class="btn btn-secondary" href="{{ route('login') }}">Login</a>
            @endif
        </div>
    </form>
    @endif
@endsection
