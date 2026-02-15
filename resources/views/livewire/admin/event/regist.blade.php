<x-form wire:submit="save">
    <x-input label="Category" type="select" wire="category" placeholder="Select" :options="$categories" />
    <x-input label="Clubs" type="select" wire="club" placeholder="Select" :options="$clubs" />
    <x-input label="Team Name" type="text" wire="name" />
    <div class="form__buttons">
        <x-button class="button__close" x-on:click="open = false">Close</x-button>
        <x-button type="submit">Save</x-button>
    </div>
</x-form>