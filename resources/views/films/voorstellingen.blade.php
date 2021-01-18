@extends('layouts.master')
@section('content')
    <h1>{{ $film->title }}</h1>
    <div class="border-top row" style="margin-bottom: 20px">
        <div class="col-3">
            <img class="img-fluid" src="{{ $film->afbeelding }}" alt="afbeelding" style="max-height: 250px; width: auto ">
        </div>
        <div class="col-9">
            <h3 style="margin-top: 20px">{{ $film->title }}</h3>
            <p>{{ $film->beschrijving }}</p>
        </div>
{{--        <form class="offset-3" action="{{ route('voorstellingen') }}" method="post">--}}
{{--            @csrf--}}
{{--            <input type="hidden" name="filmId" value="{{ $film->id }}">--}}
{{--            <button class="btn btn-primary" type="submit" name="keuze" value="Tickets bestellen">Tickets bestellen</button>--}}
{{--        </form>--}}
    </div>
    <table class="table">
        <tr>
            <th>Dag</th>
            <th>tijd</th>
            <th>Zaal</th>
            <th>Prijs</th>
            <th>Beschikbaar</th>
            <th>Aantal</th>
            <th></th>
        </tr>
    @foreach ($voorstellingen as $voorstelling)
        <tr>
            <td>
                <p>{{ date('d/m/Y', strtotime($voorstelling->tijd)) }}</p>
            </td>
            <td>
                <p>{{ date('H:i', strtotime($voorstelling->tijd)) }}</p>
            </td>
            <td>
                <p>{{ $voorstelling->zaal->naam }}</p>
            </td>
            <td>
                <p>{{ $voorstelling->prijs }} €</p>
            </td>
            <td>
                <p>{{ $voorstelling->zaal->plaatsen - $voorstelling->gereserveerd }}</p>
            </td>
            <form method="POST" action="{{ route('inWinkelMand') }}">
                @csrf
                <td>
                    <div>

                    <input class="form-control @error('aantal'. $voorstelling->id) is-invalid @enderror" type="number" name="aantal{{$voorstelling->id}}" value="{{ old('aantal'. $voorstelling->id) }}"/>
                        @error('aantal'. $voorstelling->id)
                            <div class="invalid-feedback" role="alert">
                                <span>
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                            </div>
                        @enderror
                    </div>
                </td>
                <td>
                    <input type="hidden" name="voorstelling" value="{{ $voorstelling->id }}">
                    <button class="btn btn-sm btn-secondary">In Winkelmand</button>
                </td>
            </form>
        </tr>
    @endforeach
    </table>
@endsection
