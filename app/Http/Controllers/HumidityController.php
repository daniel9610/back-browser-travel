<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\HumidityRepository;
use App\Services\Openweather\Openweather;

class HumidityController extends Controller
{
    protected $humidities;

    public function __construct(HumidityRepository $humidities){
        $this->humidities = $humidities;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $humidity = $this->humidities->index();
        return response()->json($humidity);
    }

    public function store(Request $request)
    {
        $humidity = $this->humidities->store($request);
        return $humidity;
    }

    public function getHumidity(Request $request)
    {
        $lng = $request->lng;
        $lat = $request->lat;
        $service_results = Openweather::getHumidityFromOpenwether($lng, $lat);
        return response()->json($service_results);
    }

}
