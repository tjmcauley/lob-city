@extends('layouts.app')

@section('title', '{{$team}}')

@section('content')
    <ul>
        <li>Name: {{$team->name}}</li>
    </ul>
@endsection