<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = Cities::all();

        return view('cities.index', ['cities' => $cities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $city = new Cities();
        $city->name = request('city_name');
        $city->save();

        return redirect('/cities');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cities  $cities
     * @return \Illuminate\Http\Response
     */
    public function show(Cities $cities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cities  $cities
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = Cities::find($id);
        return view('cities.edit', [
            'city' => $city
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cities  $cities
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $city = Cities::find($id);
        $city->name = request('city_name');
        $city->save();

        return redirect('/cities');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cities  $cities
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = Cities::find($id);
        $city->delete();
        return redirect('/cities');
    }
}
