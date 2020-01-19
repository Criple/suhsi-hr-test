<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{

    private const api_key = '3b1e31d0-4169-4984-b38a-132b0fd080c5';
    private const omskLat = '54.989342';
    private const omskLon = '73.368212';

    public function index(Request $request){

        $weatherData = $this->getWeatherData();


        return view('weather', array(
            'weatherIcon' => $weatherData['fact']['icon'],
            'temp' => $weatherData['fact']['temp'],
            'feelsLike' => $weatherData['fact']['feels_like'],
            'weatherDesc' => $weatherData['fact']['condition'],
            'windSpeed' => $weatherData['fact']['wind_speed'],
            'windDegree' => $weatherData['fact']['wind_dir'],
            'pressure' => $weatherData['fact']['pressure_mm'],
            'humidity' => $weatherData['fact']['humidity']
        ));
    }

    private function getWeatherData(){
        $ch = curl_init('https://api.weather.yandex.ru/v1/forecast?lat='. self::omskLat .'&lon='. self::omskLon);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true
        ]);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'X-Yandex-API-Key:' . self::api_key,
        ]);
        $result = curl_exec($ch);

        If (curl_errno($ch) == 0) {
            $data = json_decode($result, true);
        } else {
            $data = false;
        }
        curl_close($ch);
        return $data;

    }

}
