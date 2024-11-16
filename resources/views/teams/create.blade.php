@extends('layouts.app')

@section('title', 'Add a Team')

@section('content')
    <form method="POST" action="{{ route('teams.store') }}">
        @csrf
        <p>Team name: <input type="text" name="name"
            value="{{ old('name') }}"></p>
        
        <p> City ID:
            <select name="city_id">
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}">
                        {{ $city->name  }}
                    </option>
                @endforeach
            </select>
        </p>

        <p> Venue ID:
            <select name="venue_id">
                @foreach ($venues as $venue)
                    <option value="{{ $venue->id }}">
                        {{ $venue->name  }}
                    </option>
                @endforeach
            </select>
        </p>

        <input type="submit" value="Submit">
        <a href="{{ route('teams.index') }}">Cancel</a>
    </form>
@endsection