@extends('layouts.app')

@section('title', 'Teams list')

@section('content')
    <p>The teams in the NBA</p>
    <ul>
        @foreach ($teams as $team)
            <li>{{ $team->name }}</li>
        @endforeach
    </ul>
@endsection