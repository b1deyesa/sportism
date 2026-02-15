<x-form wire:submit="destroy">
    <x-input type="password" wire="password" placeholder="Your Password" />
    <div class="form__buttons">
        <x-button class="button__close" x-on:click="open = false">Close</x-button>
        <x-button type="submit">Delete</x-button>
    </div>
</x-form>