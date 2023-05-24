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

    public function store($data)
    {
        $humidity_log = new Humidity;
        $humidity_log->place_name = $data->place_name;
        $humidity_log->lng = $data->lng;
        $humidity_log->lat = $data->lat;
        $humidity_log->humidity = $data->humidity;
        $humidity_log->save();
        return $humidity_log;
    }
}