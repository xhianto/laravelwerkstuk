@extends('layouts.master')
@section('content')
    <h1>Lijst van alle Users</h1>
    @if ($users->count() == 0)
        <h2 class="alert alert-danger">Geen users</h2>
    @else
        @foreach ($users as $user)
            <div>
                <a href="{{ route('profiel', ['username' => $user->username]) }}">{{ $user->username }}</a>
            </div>
        @endforeach
    @endif
@endsection
