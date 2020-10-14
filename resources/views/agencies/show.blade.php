@extends ('layout')

@section('content')
<div
  class="
    flex
    flex-col
    items-center
    w-1/2">
  <h1>{{$agency->name}}</h1>
  <p>{{$agency->description}}</p>
  <div
    class="
      flex
      justify-evenly
      w-full">
    <a href="/agencies/">Go back</a>
    <a href="/agencies/{{$agency->id}}/flights/create">Create new flight</a>
  </div>
  <div>
    <h2>
      Next flights for {{$agency->name}}
    </h2>
    <table id="flights-table" class="mx-auto">
        <tr class="table-head">
            <th>Origin</th>
            <th>Destiny</th>
            <th>Takeoff</th>
            <th>Landing</th>
        </tr>
    @foreach ($flights as $flight)
      <tr 
      onclick="window.location='flights/{{$flight->id}}/edit';"
      class="
          hover:bg-gray-300
          cursor-pointer">
          <th>{{DB::table('cities')->where('id',$flight->city_id_origin)->pluck('name')[0]}}</th>
          <th>{{DB::table('cities')->where('id',$flight->city_id_destiny)->pluck('name')[0]}}</th>
          
          <th>{{$flight->takeoff_time}}</th>
          <th>{{$flight->landing_time}}</th>
      </tr>
    @endforeach
    </table>
  <div>

</div>

@endsection