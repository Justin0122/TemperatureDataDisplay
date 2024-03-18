<?php

namespace App\Livewire;

use App\Models\Temperature;
use Livewire\Component;
use Livewire\WithPagination;

class Temperatures extends Component
{
    use WithPagination;

    public $sensor_id = 1;

    public function render()
    {

        return view('livewire.temperatures', [
            'temperatures' => Temperature::orderBy('created_at', 'desc')->where('sensor_id', $this->sensor_id)->simplepaginate(10, pageName: 'temperatures'),
            'fillables' => (new \App\Models\Temperature())->getFillable(),
            'sensors' => \App\Models\Sensor::all(),
        ])->layout('layouts.app', ['header' => 'Temperature Readings']);
    }
}
