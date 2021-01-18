@extends('layouts.master')
@section('content')
    <h1>Reserveringen van {{ $user->username }}</h1>
    @if ($voorstellingen->count() == 0)
        <h2 class="alert alert-danger">{{ $user->username }} heeft nog geen reserveringen</h2>
    @else
        <table class="table">
            <tr>
                <th>Gereserveerd op</th>
                <th>Film</th>
                <th>Datum</th>
                <th>Tijd</th>
                <th>Aantal</th>
            </tr>
            @foreach ($voorstellingen as $voorstelling)
                <tr>
                    <td>{{ $voorstelling->pivot->created_at }}</td>
                    <td>{{ $voorstelling->film->title }}</td>
                    <td>{{ date('d/m/Y', strtotime($voorstelling->tijd)) }}</td>
                    <td>{{ date('H:i', strtotime($voorstelling->tijd)) }}</td>
                    <td>{{ $voorstelling->pivot->aantal }}</td>
                </tr>
            @endforeach
        </table>
    @endif
@endsection
