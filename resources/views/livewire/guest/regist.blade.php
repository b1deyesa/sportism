<span class="auth">
    
    {{-- Banner --}}
    <div class="auth__banner">
        <img src="{{ asset('assets/img/default.png') }}" alt="auth Banner" class="banner__image">
    </div>
    
    <div class="auth__right">
        
        {{-- Header --}}
        <div class="auth__header">
            <img src="{{ asset('assets/img/sportism-logo-round.png') }}" alt="Sportism Logo" class="header__logo">
            <h2 class="header__title">Regist</h2>
        </div>
        
        {{-- Form --}}
        <x-form wire:submit="store" class="auth__form">
            <div class="form__row">
                <x-input label="First Name" type="text" wire="first_name" :required="true" />
                <x-input label="Last Name" type="text" wire="last_name" />
            </div>
            <x-input label="Email" type="text" wire="email" :required="true" />
            <x-input label="Password" type="password" wire="password" :required="true" />
            <x-input label="Confirm Password" type="password" wire="password_confirmation" :required="true" />
            <div class="form__buttons">              
                <x-button type="submit" class="button__submit"><i class="fa-solid fa-arrow-right-to-bracket"></i>Regist</x-button>
            </div>
        </x-form>
        
    </div>
    
</span>