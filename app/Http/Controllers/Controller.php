<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeatherData;

class WeatherController extends Controller
{
    public function fetchWeatherData(Request $request)
    {
        $lat = $request->query('lat');
        $lon = $request->query('lon');
        $response = file_get_contents("https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&appid=f2a59c1df933fdc5d2c10f81914e40d8");

        $weatherData = json_decode($response, true);

        // Save data to the database
        WeatherData::create([
            'longitude' => $weatherData['coord']['lon'],
            'latitude' => $weatherData['coord']['lat'],
            'weather_main' => $weatherData['weather'][0]['main'],
            'weather_description' => $weatherData['weather'][0]['description'],
            'temperature' => $weatherData['main']['temp'],
            'feels_like' => $weatherData['main']['feels_like'],
            'temp_min' => $weatherData['main']['temp_min'],
            'temp_max' => $weatherData['main']['temp_max'],
            'pressure' => $weatherData['main']['pressure'],
            'humidity' => $weatherData['main']['humidity'],
            'visibility' => $weatherData['visibility'],
            'wind_speed' => $weatherData['wind']['speed'],
            'wind_deg' => $weatherData['wind']['deg'],
            'cloudiness' => $weatherData['clouds']['all'],
            'sunrise' => date('Y-m-d H:i:s', $weatherData['sys']['sunrise']),
            'sunset' => date('Y-m-d H:i:s', $weatherData['sys']['sunset']),
            'city_name' => $weatherData['name'],
        ]);

        return view('weather', ['weatherData' => $weatherData]);
    }
}
