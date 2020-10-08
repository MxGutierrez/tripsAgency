<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cities;
class CitiesController extends Controller
{

    public function show(){
        $cities = Cities::latest()->paginate(10);
        return view('cities',[
            'cities' => $cities
        ]);
    }
}
