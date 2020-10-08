@extends ('layout')

@section('content')
<div id="wrapper">
        <h1>New city</h1>
        <form method="POST" action="/cities">
            @csrf
            <div class="field">
                <label class="label" for="city_name">City name:</label>
                <div class="control">
                    <input 
                        class="input" 
                        type="text" 
                        name="city_name" 
                        id="city_name">
                </div>
                <div class="control">
                    <button class="button is-link" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection