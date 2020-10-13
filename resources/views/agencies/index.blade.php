@extends('layout')

@section ('content')
<div class="
    text-center
    mt-8
    flex
    flex-col
    px-8">
    <div class="flex flex-row justify-between">
        <a href="/">Go back</a><br>
        <a href="agencies/create">Create new agency</a>
    </div>

    <h1 class="title mb-4">Agencies:</h1>
    <div class="grid grid-cols-4 gap-4">
    @foreach ($agencies as $agency)
       <div>{{$agency->name}}</div>
       <div><a href="/agencies/{{$agency->id}}/edit"><h3>Edit</h3></a></div>
       <div><a href="#"><h3>View flights</h3></a></div>
       <div><a href="agencies/{{$agency->id}}/flights/create"><h3>Create new flight</h3></a></div>
    @endforeach
    </div>
</div>
@endsection