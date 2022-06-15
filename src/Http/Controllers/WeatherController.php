<?php

namespace Dfytech\Weather\Http\Controllers;

use App\Http\Controllers\Controller;
use DfyTech\Weather\Http\Requests\IpRequest;
use DfyTech\Weather\Models\Guest;
use DfyTech\Weather\Models\GuestWeather;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;

class WeatherController extends Controller
{
    public function index()
    {
        $guests = Guest::with('weathers')->get();

        return view('weather::index', compact('guests'));
    }

    public function store(IpRequest $request)
    {
        $url = config('weather.ip_url') . $request->ip . '/json/';
        try {
            $geoData = $this->getLocationData($url);  
            $weather = $this->getWeatherData($geoData);
            $guest = [
                'ip' => $request->ip,
            ];

            $guest = Guest::firstOrCreate($guest);

            $weatherData = [
                'guest_id' => $guest->id,
                'datetime' => now(),
                'weather' => json_encode($weather),
            ];
            $weather = GuestWeather::create($weatherData);
            
            return redirect()->route('weather');

        } catch (\Throwable $e) {
            return 'Cannot connot get geo data';
        }
    }

    public function getLocationData($url)
    {
        $data = Http::get($url)->throw()->json();
        // return [
        //     'latitude' => 	37.42301, 
        //     'longitude' => 	-122.083352
        // ];
        return [
            'latitude' => $data['latitude'], 
            'longitude' => $data['longitude']
        ];
    }

    public function getWeatherData($geoData)
    {
        $url = config('weather.weather_url') . '?lat=' .
                    $geoData['latitude'] . '&lon=' .
                    $geoData['longitude'] . '&appid=' . config('weather.weather_api_key');
        $response =  Http::get($url)->throw()->json();
        return $response;
    }
}

