<?php

namespace App\Services\Openweather;


class Openweather{

    public static function getHumidityFromOpenwether( $lng, $lat )
    {
        $bearer = env('OPENWEATHER_ID');
        $url = 'http://api.openweathermap.org/data/2.5/weather&lng='.$lng.'&lat='.$lat.'&appid='.$bearer;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $err = curl_error($ch);  //if you need
        curl_close($ch);
        $result = json_decode($response);
        return $result;
    }

}
