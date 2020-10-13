@extends ('layout')

@section('content')
<div id="wrapper">
        <h1>New flight</h1>

        <form method="POST" action="/agencies/{{$agency->id}}/flights/create">
            @csrf
            @if ($agency->id != null)
                <h1>Agency name: {{$agency->name}}</h1>
            @else
                <div class="field">
                    <label class="label" for="agency">Agency:</label>
                    <div class="control">
                        <select
                            name="agency">
                            @foreach ($agencies as $agency)
                                <option value={{ $agency->id }}>{{$agency->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endif



            <div class="field">
                <label class="label" for="destiny">Destiny:</label>
                <div class="control">
                    <select
                        name="destiny">
                        @foreach ($cities as $destiny)
                            <option value={{ $destiny->id }}>{{$destiny->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>



            <div class="field">
                <label class="label" for="origin">Origin:</label>
                <div class="control">
                    <select
                        name="origin">
                        @foreach ($cities as $origin)
                            <option value={{ $origin->id }}>{{$origin->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>



            <div class="field">
                <label for="takeoff_time">Takeoff (date and time):</label>
                <div class="control">
                    <input type="datetime-local" id="takeoff_time" name="takeoff_time">
                </div>
            </div>



            <div class="field">
                <label for="landing_time">Landing (date and time):</label>
                <div class="control">
                    <input type="datetime-local" id="landing_time" name="landing_time">
                </div>
            </div>




            <div class="field">
                <div class="control">
                    <button class="button is-link" type="submit">Submit</button>
                </div>
            </div>


        </form>



        <a href="/agencies"><button class="button is-link">Cancel</button></a>
    </div>
@endsection