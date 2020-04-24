<?php

namespace Spatie\TimeWeatherTile\Services;

use Illuminate\Support\Facades\Http;

class OpenWeatherMap
{
    public static function getWeatherReport(string $key, string $city): array
    {
        $url = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$key}&units=metric";

        return Http::get($url)->json();
    }
}
