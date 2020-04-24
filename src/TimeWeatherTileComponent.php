<?php

namespace Spatie\TimeWeatherTile;

use Livewire\Component;

class TimeWeatherTileComponent extends Component
{
    /** @var string */
    public $position;

    public function mount(string $position)
    {
        $this->position = $position;
    }

    public function render()
    {
        $weatherStore = TimeWeatherStore::make();

        return view('components.tiles.timeWeather', [
            'city' => $weatherStore->getCity(),
            'forecasts' => $weatherStore->forecasts(),
            'outsideTemperature'  => $weatherStore->outsideTemperature(),
            'emoji' => $weatherStore->getEmoji(),
        ]);
    }
}
