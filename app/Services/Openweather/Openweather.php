<?php

namespace App\Services\Openweather;

use Illuminate\Support\Facades\Http;

class Openweather{

    public static function getHumidityFromOpenwether( $lng, $lat )
    {
        $bearer = env('OPENWEATHER_ID');
        $link = 'https://api.openweathermap.org/data/3.0/onecall&lng='.$lng.'&lat='.$lat.'&appid='.$bearer;
        $response = Http::post($link);
        $bodyresponcs = $response->getBody();
        $result = json_decode($bodyresponcs);
        return $result;
    }

}
