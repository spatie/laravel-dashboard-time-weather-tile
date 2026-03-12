<?php

namespace Spatie\TimeWeatherTile;

use Illuminate\Contracts\View\View;
use Spatie\Dashboard\Components\BaseTileComponent;

class TimeWeatherTileComponent extends BaseTileComponent
{
    public function render(): View
    {
        $weatherStore = TimeWeatherStore::make();

        return view('dashboard-time-weather-tile::tile', [
            'city' => $weatherStore->getCity(),
            'countryCode' => $weatherStore->getCountryCode(),
            'forecasts' => $weatherStore->forecasts(),
            'insideTemperature' => $weatherStore->insideTemperature(),
            'outsideTemperature' => $weatherStore->outsideTemperature(),
            'emoji' => $weatherStore->getEmoji(),
            'unit' => config('dashboard.tiles.time_weather.units') ?? 'metric',
        ]);
    }
}
