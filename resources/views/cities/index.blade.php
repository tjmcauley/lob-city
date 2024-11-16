@extends('layouts.app')

@section('title', 'Cities list')

@section('content')
    <p>Lob Cities</p>
    <ul>
        @foreach ($cities as $city)
            <li><a href="{{ route('cities.show', $city) }}"> {{ $city->name }}</a></li>
        @endforeach
    </ul>
@endsection
