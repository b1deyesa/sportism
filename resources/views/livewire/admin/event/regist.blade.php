<x-form class="regist__form" wire:submit="save">
    <x-input label="Category" type="select" wire="category" placeholder="Select" :options="$categories" />
    <hr class="form__separator">
    <div class="form__row">
        <x-input label="Team Logo" type="image" wire="logo" />
        <div class="form__column">
            <x-input label="Clubs" type="select" wire="club" placeholder="Select" :options="$clubs" />
            <small>Jika belum memiliki club maka kosongkan</small>
            <x-input label="Team Name" type="text" wire="name" />
        </div>
    </div>
    <div class="form__buttons">
        <x-button class="button__close" x-on:click="open = false">Close</x-button>
        <x-button type="submit">Save</x-button>
    </div>
</x-form>