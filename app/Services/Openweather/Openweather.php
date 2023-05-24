<?php

namespace App\Services\Openweather;

use GuzzleHttp\Client as GuzzleClient;

class Openweather{

    public static function getHumidityFromOpenwether( $lng, $lat )
    {
        $client = new GuzzleClient();
        $bearer = env('OPENWEATHER_ID');
        $link = 'https://api.openweathermap.org/data/3.0/onecall&lng='.$lng.'&lat='.$lat.'&appid='.$bearer;
        $response = GuzzleClient::request('GET', $link);
        $bodyresponcs = $response->getBody();
        $result = json_decode($bodyresponcs);
        return $result;
    }

}
