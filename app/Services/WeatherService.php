<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherService
{

    /**
     * WeatherService constructor.
     */
    public function __construct()
    {

    }


    /**
     * Gets the weather data from yandex
     * @param $lat
     * @param $lon
     * @return array|null
     */
    public function getWeatherData($lat, $lon){
        $res = Http::withHeaders([
            'X-Yandex-API-Key' => config('weather.api_key')
        ])->get(config('weather.api_url'), [
            'lat' => $lat,
            'lon' => $lon
        ]);
        if ($res->successful()){
            $weatherData =  $res->json();

            return [
                'weatherIcon' => $weatherData->fact->icon,
                'temp' => $weatherData->fact->temp,
                'feelsLike' => $weatherData->fact->feels_like,
                'weatherDesc' => $weatherData->fact->condition,
                'windSpeed' => $weatherData->fact->wind_speed,
                'windDegree' => $weatherData->fact->wind_dir,
                'pressure' => $weatherData->fact->pressure_mm,
                'humidity' => $weatherData->fact->humidity
            ];
        }

        return null;
    }

}
