@extends('layout')

@section ('content')
    <h1>Cities:</h1>
    @foreach ($cities as $city)
        <h3>{{$city->name}}</h3>
    @endforeach
@endsection