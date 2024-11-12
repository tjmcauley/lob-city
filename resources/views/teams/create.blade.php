@extends('layouts.app')

@section('title', 'Add a Team')

@section('content')
    <form method="POST" action="{{ route('teams.store') }}">
        @csrf
        <p>Team name: <input type="text" name="name"
            value="{{ old('name') }}"></p>
        <p>City ID: <input type="text" name="city_id"
            value="{{ old('city_id') }}"></p>
        <p>Venue ID: <input type="text" name="venue_id"
            value="{{ old('venue_id') }}"></p>
        <input type="submit" value="Submit">
        <a href="{{ route('teams.index') }}">Cancel</a>
    </form>
@endsection