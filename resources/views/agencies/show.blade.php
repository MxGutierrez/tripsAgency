@extends ('layout')

@section('content')
<div
  class="
    flex
    flex-col
    items-center
    w-1/3">
  <h1>{{$agency->name}}</h1>
  <p>{{$agency->description}}</p>
  <div
    class="
      flex
      justify-between
      w-full
      my-2">
    <a href="/agencies/">Go back</a>
    <a href="/agencies/{{$agency->id}}/flights/create">Create new flight</a>
  </div>
  <div class="flex justify-between w-full">
    <h2>
      Next flights for {{$agency->name}}
    </h2>
    <a href="/agencies/{{$agency->id}}/edit">Edit agency</a>
  </div>
    <table id="flights-table" class="mx-auto w-full" >
        <tr class="table-head">
            <th>Origin</th>
            <th>Destiny</th>
            <th>Takeoff</th>
            <th>Landing</th>
        </tr>
    @foreach ($flights as $flight)
      <tr 
      onclick="window.location='/flights/{{$flight->id}}/edit';"
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
  

</div>

@endsection