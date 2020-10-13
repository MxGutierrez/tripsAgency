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
        $flights = Flight::all();

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
            'takeoff_time' => 'required',
            'landing_time' => 'required'
        ]);

        Flight::create([
            'agency_id' => request('agency'),
            'city_id_origin' => request('origin'),
            'city_id_destiny' => request('destiny'),
            'takeoff_time' => request('takeoff_time'),
            'landing_time' => request('landing_time')
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
    public function destroy(Flight $flight)
    {
        //
    }
}
