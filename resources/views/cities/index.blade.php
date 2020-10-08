@extends('layout')

@section ('content')
    <div class="ml-4">
    <h1>Cities:</h1>
    <a href="cities/create">Create new city</a>
    @foreach ($cities as $city)
        <a href="/cities/{{$city->id}}/edit"><h3>{{$city->name}}</h3></a>
    @endforeach
    </div>
@endsection