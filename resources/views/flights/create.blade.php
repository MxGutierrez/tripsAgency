@extends ('layout')

@section('content')
<div id="wrapper" class="w-1/2">
        <div class="
            text-center
            my-4">
            <h1>New flight</h1>
            @if ($agency->id != null)
                <h1>Agency name: {{$agency->name}}</h1>
            @endif
        </div>
        <form 
            class="flex
                flex-col
                justify-center
                w-full"    
        method="POST" action="/agencies/{{$agency->id}}/flights/create">
            @csrf
            @if ($agency->id == null)
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
                @error('agency')
                <p>{{$errors->first('agency')}}</p>
            @enderror
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
                @error('destiny')
                <p>{{$errors->first('destiny')}}</p>
            @enderror
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
                @error('origin')
                <p>{{$errors->first('origin')}}</p>
            @enderror
            </div>



            <div class="field">
                <label for="takeoff_date">Takeoff date:</label>
                <div class="control">
                    <input type="date" id="takeoff_date" name="takeoff_date" max="9999-12-31">

                </div>
                @error('takeoff_date')
                <p>{{$errors->first('takeoff_date')}}<br>
                    @if ( $errors->first('takeoff_date') == "The takeoff date does not match the format Y-m-d.")
                        If you are typing the date by hand, please follow the yyyy-mm-dd format. If you used the date 
                        selector, don't chose a year larger that 9999.
                    @endif
                </p>
            @enderror
            </div>


            <div class="field">
                <label for="takeoff_time">Takeoff time:</label>
                <div class="control">
                    <input type="time" id="takeoff_time" name="takeoff_time" max="9999-12-31">
                </div>
                @error('takeoff_time')
                    <p>{{$errors->first('takeoff_time')}}</p>
                @enderror
            </div>



            <div class="field">
                <label for="landing_date">Landing date:</label>
                <div class="control">
                    <input type="date" id="landing_date" name="landing_date">
                </div>
                @error('landing_date')
                <p>{{$errors->first('landing_date')}}</p>
            @enderror
            </div>

            <div class="field">
                <label for="landing_time">Landing time:</label>
                <div class="control">
                    <input type="time" id="landing_time" name="landing_time">
                </div>
                @error('landing_time')
                <p>{{$errors->first('landing_time')}}</p>
            @enderror
            </div>




            <div class="field">
                <div class="flex
                flex-row
                justify-between">
                    <button class="button is-link" type="submit">Submit</button>
                    <a href="/agencies"><button class="button is-link">Cancel</button></a>
                </div>
            </div>


        </form>
    </div>
@endsection