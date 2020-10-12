<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;
    protected $fillable = [
        'agency_id', 
        'city_id_origin',
        'city_id_destiny',
        'takeoff_time',
        'landing_time'];
    
}
