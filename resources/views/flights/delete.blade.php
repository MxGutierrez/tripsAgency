@extends('layout')

@section('content')

<div>
    <h2 class="">Are you sure you want to delete this flight?</h2>
    <div class="flex justify-evenly">
        <a class="button" href="javascript:window.history.back();">Yes</a>
        <a class="button" onclick="window.history.back()" href="">No</a>
    </div>
</div>
    
@endsection