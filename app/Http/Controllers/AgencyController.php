<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Agency;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agencies = Agency::all();

        return view('agencies.index', ['agencies' => $agencies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return view('agencies.create', [
            'destinies' => $cities
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'agency_name' => 'required',
            'agency_description' => 'required'
        ]);
        $agency = new Agency();
        $agency->name = request('agency_name');
        $agency->description = request('agency_description');
        $agency->save();
        $agency->destinies()->attach(request('destinies'));
        
        return redirect('/agencies');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function show(Agency $agency)
    {

        $flights = \DB::table('flights')->where('id',$agency->id)->orderBy('takeoff_time')->get();

        return view('agencies.show', [
            'agency' => $agency,
            'flights' => $flights,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function edit(Agency $agency)
    {
        $cities = City::all();
        return view('agencies.edit', [
            'agency' => $agency,
            'destinies' => $cities
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function update(Agency $agency)
    {
        request()->validate([
            'agency_name' => 'required',
            'agency_description' => 'required'
        ]);
        $agency->name = request('agency_name');
        $agency->description = request('agency_description');
        $agency->save();
        $agency->destinies()->attach(request('destinies'));

        return redirect('/agencies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agency $agency)
    {
        $agency->delete();
        return redirect('/agencies');
    }

    public function createFlight(Agency $agency)
    {
        $cities = $agency->destinies;
        $agencies = null;
        
        return view('flights.create', [
            'cities' => $cities,
            'agencies' => $agencies,
            'agency' => $agency
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeFlight(Request $request, Agency $agency)
    {
        request()->validate([
            'city_id_origin' => 'required',
            'city_id_destiny' => 'required',
            'takeoff_date' => 'required',
            'landing_date' => 'required',
            'takeoff_time' => 'required',
            'landing_time' => 'required'
        ]);
        dd('Hola :)');
        $takeoff = request('takeoff_date')."T".request('takeoff_time');
        $landing = request('landing_date')."T".request('landing_time');
        dd([$takeoff, $landing]);
        Flight::create([
            'agency_id' => $agency->id,
            'city_id_origin' => request('origin'),
            'city_id_destiny' => request('destiny'),
            'takeoff_time' => $takeoff,
            'landing_time' => $landing
        ]);


        return redirect('/flights');
    }
}
