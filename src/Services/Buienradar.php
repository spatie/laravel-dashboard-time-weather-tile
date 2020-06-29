<?php

namespace Spatie\TimeWeatherTile\Services;

use Illuminate\Support\Facades\Http;

class Buienradar
{
    public static function getForecasts(string $latitude, string $longitude)
    {
        $endpoint = "https://graphdata.buienradar.nl/forecast/json/?lat={$latitude}&lon={$longitude}";
        
        if (Http::get($endpoint)->ok()) {
            $response = Http::get($endpoint)->json();
            
            if (count($response) > 0) {
                return collect($response['forecasts'])
                    ->map(function (array $forecast) {
                        return [
                            'time' => $forecast['datetime'],
                            'rain' => $forecast['precipitation'],
                        ];
                    })
                    ->take(12)
                    ->toArray();
            }
        }
        
        return false;
    }
}
