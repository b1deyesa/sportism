<span class="logout">
    
    {{-- Text --}}
    <p class="logout__text">Are you sure to logout?</p>
    
    {{-- Form --}}
    <x-form wire:submit="logout" class="logout__form">
        <div class="form__buttons">
            <x-button class="button__close" x-on:click="open = false">Close</x-button>
            <x-button type="submit" class="button__submit"><i class="fa-solid fa-arrow-right-from-bracket"></i>Logout</x-button>
        </div>
    </x-form>
    
</span>