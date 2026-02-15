<span class="auth">
    
    {{-- Banner --}}
    <div class="auth__banner">
        <img src="{{ asset('assets/img/default.png') }}" alt="auth Banner" class="banner__image">
    </div>
    
    <div class="auth__right">
        
        {{-- Header --}}
        <div class="auth__header">
            <img src="{{ asset('assets/img/sportism-logo-round.png') }}" alt="Sportism Logo" class="header__logo">
            <h2 class="header__title">Login</h2>
        </div>
        
        {{-- Form --}}
        <x-form wire:submit="authenticate" class="auth__form">
            <x-input label="Email" type="email" wire="email" :required="true" />
            <x-input label="Password" type="password" wire="password" :required="true" />
            <div class="form__action">
                <x-input type="checkbox" wire="remember" :options="json_encode(['Remember Me'])" class="action__remember" />
                <a href="" class="action__forget">Forget Password?</a>
            </div>
            <div class="form__buttons">              
                <x-button type="submit" class="button__submit"><i class="fa-solid fa-arrow-right-to-bracket"></i>Login</x-button>
                <x-modal class="button__redirect">
                    <x-slot:trigger>Create an account?</x-slot:trigger>
                    @livewire('guest.regist')
                </x-modal>
            </div>
        </x-form>
        
    </div>
    
</span>