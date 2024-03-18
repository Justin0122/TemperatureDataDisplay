<?php

namespace App\Livewire;

use App\Models\Sensor;
use Livewire\Component;

class DynamicTempTables extends Component
{
    public $sensor_ids = [];

    public function mount()
    {
        //if the user has none, add the default ones, but only if the sensors exist
        $total = count(auth()->user()->sensors);
        if ($total === 0) {
            for ($i = 1; $i <= 3; $i++) {
                if (Sensor::find($i)) {
                    auth()->user()->sensors()->create(['table_id' => $i, 'sensor_id' => $i]);
                }
            }
        }

        $this->sensor_ids = auth()->user()->sensors->pluck('sensor_id')->toArray();
    }

    public function addSensor()
    {
        //see how many the user has already and add + 1
        $total = count($this->sensor_ids);
        $this->sensor_ids[] = $total + 1;
        //only add it if there's a sensor with that id
        if (Sensor::find($total + 1)) {
            return auth()->user()->sensors()->create(['table_id' => $total + 1, 'sensor_id' => $total + 1]);
        } else {
            array_pop($this->sensor_ids);
        }
    }

    public function removeSensor($sensor_id): void
    {
        auth()->user()->sensors()->where('sensor_id', $sensor_id)->delete();
        $this->sensor_ids = array_diff($this->sensor_ids, [$sensor_id]);
    }

    public function render()
    {
        return view('livewire.dynamic-temp-tables', [
            'sensors' => Sensor::all(),
        ])->layout('layouts.app', ['header' => 'Temperature Sensors']);
    }
}
