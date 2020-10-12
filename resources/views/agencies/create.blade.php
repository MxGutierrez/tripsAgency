@extends ('layout')

@section('content')
<div id="wrapper">
        <h1>New agency</h1>
        <form method="POST" action="/agencies">
            @csrf
            <div class="field">
                <label class="label" for="name">Agency name:</label>
                <div class="control">
                    <input 
                        class="input" 
                        type="text" 
                        name="agency_name" 
                        id="agency_name">
                </div>
                
                
            </div>
            <div class="field">
                <label class="label" for="name">Agency description:</label>
                <div class="control">
                    <input 
                        class="textarea" 
                        type="textarea" 
                        name="agency_description" 
                        id="agency_description">
                </div>
            </div>
            <div class="field">
                <label class="label" for="destinies">Destinies:</label>
                <div class="control">
                    <select
                        name="destinies[]"
                        multiple>
                        @foreach ($destinies as $destiny)
                            <option value={{ $destiny->id }}>{{$destiny->name}}</option>
                        @endforeach
                    </select>
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