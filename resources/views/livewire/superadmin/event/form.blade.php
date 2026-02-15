<x-form wire:submit="save">
    <x-input label="Event Name" type="text" wire="name" />
    <x-input label="Status" type="text" wire="status" />
    <div class="form__row">
        <x-input label="Date Start" type="date" wire="date_start" />
        <x-input label="Date End" type="date" wire="date_end" />
    </div>
    <div class="form__buttons">
        <x-button class="button__close" x-on:click="open = false">Close</x-button>
        <x-button type="submit">Save</x-button>
    </div>
</x-form>