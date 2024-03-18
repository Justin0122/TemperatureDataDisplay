<?php

namespace App\Livewire;

use Livewire\Component;

class Temperature extends Component
{
    public $temperatures;

    public function render()
    {
        $this->temperatures = \App\Models\Temperature::orderBy('created_at', 'desc')->take(100)->get();

        return view('livewire.temperature', ['temperatures' => $this->temperatures])->layout('layouts.app', ['header' => 'Temperature Readings']);
    }
}
