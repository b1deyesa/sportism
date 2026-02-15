<x-form class="player__form" wire:submit="save">
    <x-input label="Player Name" type="text" wire="name" />
    <div class="form__buttons">
        <x-button class="button__close" x-on:click="open = false">Close</x-button>
        <x-button type="submit">Save</x-button>
    </div>
</x-form>