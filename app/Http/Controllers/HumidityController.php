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

    public function getHumidity( $lng, $lat )
    {
        $service_results = Openweather::getHumidityFromOpenwether($lng, $lat);
        if(isset($service_results->cod)){
            if($service_results->cod == 200){
                $place_name = $service_results->name;
                $humidity = $service_results->main->humidity;
                $humidity_log = $this->humidities->store($request, $place_name, $humidity);
                return response()->json($humidity_log);
            }  
        }
        return response()->json($service_results);
    }

}
