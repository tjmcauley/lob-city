@extends('layouts.app')

@section('title', 'Teams list')

@section('content')
    <p>The teams in the NBA</p>
    <ul>
        @foreach ($teams as $team)
            <li><a href="{{ route('teams.show', ['id' => $team->id]) }}"> {{$team->name }}</a></li>
        @endforeach
    </ul>
@endsection