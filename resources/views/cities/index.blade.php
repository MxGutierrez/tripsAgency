@extends('layout')

@section ('content')
    <div 
    class="ml-4
        flex
        flex-col
        items-center
        w-1/2">
        <h1
            class="title">Cities:</h1>
        <div
            class="
                flex
                justify-evenly
                w-full">
            <a href="/">Go back</a><br>
            <a href="cities/create">Create new city</a>
        </div>
        @foreach ($cities as $city)
            <a href="/cities/{{$city->id}}/edit"><h3>{{$city->name}}</h3></a>
        @endforeach
    </div>
@endsection