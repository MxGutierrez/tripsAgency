@extends('layout')

@section ('content')
<div class="
    text-center
    mt-8">
    <h1
        class="
            title
            my-4">Next flights:</h1>
{{--     <a href="/">Go back</a><br>
    <a href="flights/create">Create new flight</a> --}}
    <table id="flights-table" class="mx-auto">
        <tr class="table-head">
            <th>Agency</th>
            <th>Origin</th>
            <th>Destiny</th>
            <th>Takeoff</th>
            <th>Landing</th>
        </tr>
    @foreach ($flights as $flight)
    <a href="flights/{{$flight->id}}/edit">
        <tr 
            onclick="window.location='flights/{{$flight->id}}/edit';"
            class="
                hover:bg-gray-300
                cursor-pointer">
            <th>{{DB::table('agencies')->where('id',$flight->agency_id)->pluck('name')[0]}}</th>
            <th>{{DB::table('cities')->where('id',$flight->city_id_origin)->pluck('name')[0]}}</th>
            <th>{{DB::table('cities')->where('id',$flight->city_id_destiny)->pluck('name')[0]}}</th>
            
            <th>{{DB::table('flights')->where('id',$flight->id)->pluck('takeoff_time')[0]}}</th>
            <th>{{DB::table('flights')->where('id',$flight->id)->pluck('landing_time')[0]}}</th>
        </tr>
    </a>
    @endforeach
    </table>
</div>
@endsection