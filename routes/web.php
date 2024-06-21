<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/weather', function () {
    return view('weather');
});

Route::get('/resultWeather', function () {
    return view('resultWeather');
});
