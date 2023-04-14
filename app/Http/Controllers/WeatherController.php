<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;

class WeatherController extends Controller
{

    /**
     * Displays weather page
     * @param WeatherService $weatherService
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(WeatherService $weatherService)
    {
        $weatherData = $weatherService->getWeatherData(54.9924, 73.3686);

        return view('weather', ['weatherData' => $weatherData]);
    }



}
