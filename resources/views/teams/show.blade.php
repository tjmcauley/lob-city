@extends('layouts.app')

@section('title', '{{$team}}')

@section('content')
    <ul>
        <li>Name: {{$team->name}}</li>
    </ul>

    <form method="POST"
        action="{{ route('teams.destroy', ['id' => $team->id]) }}">
        @csrf
        @method("DELETE")
        <button type="submit"> Delete </button>
    </form>
@endsection
