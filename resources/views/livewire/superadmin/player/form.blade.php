<x-form class="player__form" wire:submit="save">
    <div class="form__row">
        <x-input label="Photo" type="image" wire="avatar" />
        <x-input label="Player Name" type="text" wire="name" />
    </div>
    <div class="form__buttons">
        <x-button class="button__close" x-on:click="open = false">Close</x-button>
        <x-button type="submit">Save</x-button>
    </div>
</x-form>