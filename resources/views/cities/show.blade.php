@extends('layouts.app')

@section('title', '{{$city}}')

@section('content')
    <ul>
        <li>Name: {{$city->name}}</li>
    </ul>
@endsection