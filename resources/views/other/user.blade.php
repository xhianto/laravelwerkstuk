@extends('layouts.master')
@section('content')
    <h1>Welkom op UserPage</h1>
    @if(Auth::user()->hasRole('admin'))
        <h2>Alleen admin zou dit moeten moeten</h2>
    @endif
@endsection
