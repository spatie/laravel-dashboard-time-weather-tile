<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Spatie\TimeWeatherTile\Http\Controllers\UpdateTemperatureController;

it('registers the artisan commands', function () {
    $commands = Artisan::all();

    expect($commands)->toHaveKey('dashboard:fetch-open-weather-data');
    expect($commands)->toHaveKey('dashboard:fetch-buienradar-forecasts');
});

it('registers the temperature route', function () {
    $route = Route::getRoutes()->getByAction(UpdateTemperatureController::class);

    expect($route)->not->toBeNull();
});
