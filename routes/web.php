<?php

use Dfytech\Weather\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

Route::get('weather', [WeatherController::class, 'index'])->name('weather');
Route::post('weather', [WeatherController::class, 'store'])->name('weather.store');