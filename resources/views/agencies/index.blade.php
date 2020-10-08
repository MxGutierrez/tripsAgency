@extends('layout')

@section ('content')
    <h1>Agencies:</h1>
    <a href="agencies/create">Create new city</a>
    @foreach ($agencies as $agency)
        <a href="/agencies/{{$agency->id}}/edit"><h3>{{$agency->name}}</h3></a>
    @endforeach
@endsection