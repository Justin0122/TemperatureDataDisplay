<div>
    <div class="grid grid-cols-2 gap-4">
        @foreach($sensor_ids as $sensor_id)
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <x-danger-button wire:click="removeSensor({{ $sensor_id }})">Remove Sensor</x-danger-button>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <livewire:temperatures :sensor_id="$sensor_id" :key="$sensor_id"/>
                </div>
            </div>
        @endforeach
        @isset($sensors)
            @if(count($sensors) != count($sensor_ids))
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <x-primary-button wire:click="addSensor">Add Sensor</x-primary-button>
                </div>
            @endif
        @endunless
    </div>
</div>
