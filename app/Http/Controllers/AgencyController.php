<?php

namespace App\Http\Controllers;

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function edit(Agency $agency)
    {

        return view('agencies.edit', [
            'agency' => $agency
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
}
