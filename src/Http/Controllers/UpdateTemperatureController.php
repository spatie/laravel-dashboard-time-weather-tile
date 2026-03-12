<?php

namespace Spatie\TimeWeatherTile\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\TimeWeatherTile\TimeWeatherStore;

class UpdateTemperatureController
{
    public function __invoke(Request $request): string
    {
        $temperature = $request->validate([
            'temperature' => ['required', 'numeric'],
        ]);

        $temperature = round($temperature['temperature'], 1);

        TimeWeatherStore::make()->setInsideTemperature($temperature);

        return 'ok';
    }
}
