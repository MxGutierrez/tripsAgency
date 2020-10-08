@extends ('layout')
@section('header')
    <style>
        .input{
            border: solid black 1px;
        }
    </style>
@endsection
@section('content')
    <div id="wrapper">
        <h1>Edit agency {{$agency->name}}</h1>
        <form method="POST" action="/agencies/{{$agency->id}}">
            @csrf
            @method('PUT')
            <div class="field">
                <label class="label" for="agency_name">Agency name:</label>
                <div class="control">
                    <input 
                        class="input" 
                        type="text" 
                        name="agency_name" 
                        id="agency_name"c
                        value="{{$agency->name}}">
                </div>
                <label class="label" for="name">Agency description:</label>
                <div class="control">
                    <input 
                        class="input" 
                        type="textarea" 
                        name="agency_description" 
                        id="agency_description"
                        value="{{$agency->description}}"><input>
                </div>
                <div class="control">
                    <button class="button is-link" type="submit">Submit</button>
                </div>
            </div>
        </form>
        <a href="/agencies"><button class="button is-link">Cancel</button></a>
        <form method="POST" action="/agencies/{{$agency->id}}">
            @csrf
            @method('DELETE')
            <button class="button is-link" type="submit">Delete agency</button>
        </form>
    </div>
@endsection