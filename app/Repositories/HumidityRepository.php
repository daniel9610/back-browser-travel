<?php

namespace App\Repositories;

use App\Humidity;
use Illuminate\Support\Facades\DB;

class HumidityRepository
{
    public function index()
    {
        $data = Humidity::all();
        return $data;
    }

    public function store($data, $placename, $humidity)
    {
        $humidity_log = new Humidity;
        $humidity_log->place_name = $placename;
        $humidity_log->lng = $data->lng;
        $humidity_log->lat = $data->lat;
        $humidity_log->humidity = $humidity;
        $humidity_log->save();
        return $humidity_log;
    }
}