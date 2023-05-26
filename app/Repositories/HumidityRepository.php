<?php

namespace App\Repositories;

use App\Humidity;
use Illuminate\Support\Facades\DB;

class HumidityRepository
{
    public function index()
    {
        $data = Humidity::paginate(20);
        return $data;
    }

    public function store($lng, $lat, $placename, $humidity)
    {
        $humidity_log = new Humidity;
        $humidity_log->place_name = $placename;
        $humidity_log->lng = $lng;
        $humidity_log->lat = $lat;
        $humidity_log->humidity = $humidity;
        $humidity_log->save();
        return $humidity_log;
    }
}