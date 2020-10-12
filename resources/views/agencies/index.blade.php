@extends('layout')

@section ('content')
<div class="
    text-center
    mt-8">
    <h1>Agencies:</h1>
    <a href="/">Go back</a><br>
    <a href="agencies/create">Create new city</a>
    @foreach ($agencies as $agency)
        <a href="/agencies/{{$agency->id}}/edit"><h3>{{$agency->name}}</h3></a>
    @endforeach
</div>
@endsection