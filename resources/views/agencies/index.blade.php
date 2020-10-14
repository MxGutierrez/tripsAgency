@extends('layout')

@section ('content')
<div class="
    text-center
    mt-8
    flex
    flex-col
    px-8
    w-1/2">
    <div class="flex flex-row justify-between">
        <a href="/">Go back</a><br>
        <a href="agencies/create">Create new agency</a>
    </div>

    <h1 class="title mb-4">Agencies:</h1>
    <div class="
        flex
        flex-col
        items-center
        w-auto">
    @foreach ($agencies as $agency)
       <div class="
        agencyButton
        w-20
        border-solid
        border-2
        border-indigo-300
        rounded-md
        my-2" >
       <a href="/agencies/{{$agency->id}}"><h3>{{$agency->name}}</h3> 
       </a></div>
{{--        <div><a href="/agencies/{{$agency->id}}/edit"><h3>Edit</h3></a></div>
       <div><a href="#"><h3>View flights</h3></a></div>
       <div><a href="agencies/{{$agency->id}}/flights/create"><h3>Create new flight</h3></a></div> --}}
    @endforeach
    </div>
</div>
@endsection