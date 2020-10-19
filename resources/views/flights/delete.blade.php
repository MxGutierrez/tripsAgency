@extends('layout')

@section('content')

<div>
    <h2 class="">Are you sure you want to delete this flight?</h2>
    <div class="flex justify-evenly">
        <form method="POST" action="/flights/{{$flight->id}}">
            @csrf
            @method('DELETE')
            <button class="button is-link" type="submit">Yes</button>
        </form>
        <a class="button" href="javascript:window.history.back();">No</a>
    </div>
</div>
    
@endsection