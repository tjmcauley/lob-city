@extends('layouts.app')

@section('title', 'Cities list')

@section('content')
    <p>Lob Cities</p>
    <ul>
        @foreach ($cities as $city)
            <li><a href="{{ route('cities.show', ['id' => $city->id]) }}"> {{ $city->name }}</a></li>
        @endforeach
    </ul>
@endsection