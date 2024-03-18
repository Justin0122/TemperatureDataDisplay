<div wire:poll.5s>
    <select name="sensor_id" id="sensor_id" class="form-control bg-gray-200 dark:bg-gray-700"
            wire:model.live="sensor_id">
        <option value="">Select a sensor</option>
        @foreach($sensors as $sensor)
            <option value="{{ $sensor->id }}">{{ $sensor->name }}</option>
        @endforeach
    </select>
    <x-table :results="$temperatures"
             :fillables="$fillables"
             type="temperature" />
</div>
