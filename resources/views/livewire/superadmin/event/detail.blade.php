<x-form class="event__detail" wire:submit="save">
    <x-input label="Description" type="editor" wire="description" />
    <div class="form__row">
        <x-input label="Event Location" type="text" wire="address" />
        <x-input label="Payment Info" type="editor" wire="payment_info" />
    </div>
    <div class="form__buttons">
        <x-button class="button__close" x-on:click="open = false">Close</x-button>
        <x-button type="submit">Save</x-button>
    </div>
</x-form>