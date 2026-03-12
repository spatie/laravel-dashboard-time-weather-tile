<?php

use Spatie\TimeWeatherTile\TimeWeatherStore;

it('can be instantiated', function () {
    $store = TimeWeatherStore::make();

    expect($store)->toBeInstanceOf(TimeWeatherStore::class);
});

it('can store and retrieve forecasts', function () {
    $store = TimeWeatherStore::make();

    $forecasts = [
        ['rain' => 0.5],
        ['rain' => 0.8],
    ];

    $store->setForecasts($forecasts);

    expect($store->forecasts())->toBe($forecasts);
});

it('can store and retrieve outside temperature', function () {
    $store = TimeWeatherStore::make();

    $store->setWeatherReport([
        'main' => ['temp' => 22.5],
    ]);

    expect($store->outsideTemperature())->toBe(22);
});

it('can store and retrieve inside temperature', function () {
    $store = TimeWeatherStore::make();

    $store->setInsideTemperature(21);

    expect($store->insideTemperature())->toBe(21);
});

it('returns the correct emoji for weather conditions', function () {
    $store = TimeWeatherStore::make();

    $store->setWeatherReport([
        'weather' => [['id' => 800, 'icon' => '01d']],
    ]);

    expect($store->getEmoji())->toBe('☀');
});

it('can store and retrieve city and country', function () {
    $store = TimeWeatherStore::make();

    $store->setWeatherReport([
        'name' => 'Antwerp',
        'sys' => ['country' => 'BE'],
    ]);

    expect($store->getCity())->toBe('Antwerp');
    expect($store->getCountryCode())->toBe('BE');
});

it('returns null for missing data', function () {
    $store = TimeWeatherStore::make();

    expect($store->outsideTemperature())->toBeNull();
    expect($store->insideTemperature())->toBeNull();
    expect($store->getCity())->toBeNull();
    expect($store->getCountryCode())->toBeNull();
});
