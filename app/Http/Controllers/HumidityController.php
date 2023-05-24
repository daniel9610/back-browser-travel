<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\HumidityRepository;

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

}
