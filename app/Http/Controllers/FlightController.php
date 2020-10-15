<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\City;
use App\Models\Agency;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flights = \DB::table('flights')->orderBy('takeoff_time')->get();

        return view('flights.index', ['flights' => $flights]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Agency $agency)
    {
        if ($agency->id != null){
            $cities = $agency->destinies;
            $agencies = null;
        } else {
            $cities = City::all();
            $agencies = Agency::all();
        }
        
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
    public function store(Request $request)
    {

        request()->validate([
            'agency_id' => 'required',
            'city_id_origin' => 'required',
            'city_id_destiny' => 'required',
            'takeoff_date' => 'required',
            'landing_date' => 'required',
            'takeoff_time' => 'required',
            'landing_time' => 'required'
        ]);
        
        $takeoff = request('takeoff_date')."T".request('takeoff_time');
        dd($takeoff);
        $landing = request('landing_date')."T".request('landing_time');

        Flight::create([
            'agency_id' => request('agency'),
            'city_id_origin' => request('origin'),
            'city_id_destiny' => request('destiny'),
            'takeoff_time' => $takeoff,
            'landing_time' => $landing
        ]);

        return redirect('/flights');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function show(Flight $flight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function edit(Flight $flight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flight $flight)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function delete(Flight $flight)
    {
        return view('flights.delete', $flight);
    }
    
    public function destroy(Flight $flight)
    {
        //
    }
}
