<x-layout.app class="guest">
    
    {{-- Navigation --}}
    <section class="guest__navigation">
        <div class="navigation__container">
            
            {{-- Banner --}}
            <a href="{{ route('guest.index') }}">
                <img src="{{ asset('assets/img/sportism-logo.png') }}" alt="Sportism Logo" class="navigation__banner">
            </a>
            
            {{-- Search --}}
            <x-input type="search" placeholder="Search" class="navigation__search" options="Deo" />
            
            {{-- Menu --}}
            <div class="navigation__menu">
                <a href="" class="menu__item">Profile</a>
                <a href="" class="menu__item">Event</a>
                @auth
                    <div class="menu__item__profile" x-data="{ open: false }">
                        <img src="{{ asset('assets/img/default-avatar.png') }}" alt="Avatar" class="profile__avatar" x-on:click="open = ! open">
                        <div class="profile__list" x-show="open" x-on:click.outside="open = false" x-transition.opacity x-cloak>
                            <a 
                                @superadmin
                                    href="{{ route('superadmin.index') }}"
                                @endsuperadmin
                                @adminevent
                                    href="{{ route('admin-event.index') }}"
                                @endadminevent
                                @adminteam
                                    href="{{ route('admin-team.index') }}"
                                @endadminteam
                                class="list__item">Dashboard</a>
                            <x-modal :close="false">
                                <x-slot:trigger><span class="list__item">Logout</span></x-slot:trigger>
                                @livewire('guest.logout')
                            </x-modal>
                        </div>
                    </div>
                @endauth
                @guest
                    <x-modal class="menu__item__login">
                        <x-slot:trigger><i class="fa-solid fa-lock"></i>Login</x-slot:trigger>
                        @livewire('guest.login')
                    </x-modal>
                @endguest
            </div>
            
        </div>
    </section>
    
    {{-- Layout --}}
    <section class="guest__layout{{ $class }}">
        {{ $slot }}
    </section>
    
    {{-- Footer --}}
    <section class="guest__footer">
        <div class="footer__container">
            <div class="footer__banner">
                <img src="{{ asset('assets/img/sportism-logo-round.png') }}" alt="Sportism Logo" class="banner__image">
                <h3 class="banner__tagline">Basket Media, Event,<br>and Live Score</h3>
            </div>
            <div class="footer__term">
                <div class="term__link">
                    <a href="">Term of Use</a>•
                    <a href="">Cookie policy</a>•
                    <a href="">Privacy policy</a>
                </div>
                <small class="term__description">The use of automatic services (robots, crawler, indexing etc.) as well as other methods for systematic or regular use is not permitted.</small>
            </div>
            <div class="footer__media">
                <h3 class="media__title">Follow Us</h3>
                <div class="media__list">
                    <a href="" class="list__item"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="" class="list__item"><i class="fa-brands fa-instagram"></i></a>
                    <a href="" class="list__item"><i class="fa-brands fa-x-twitter"></i></a>
                    <a href="" class="list__item"><i class="fa-brands fa-tiktok"></i></a>
                    <a href="" class="list__item"><i class="fa-solid fa-envelope"></i></a>
                </div>
            </div>
        </div>
    </section>
    
    {{-- Copyright --}}
    <section class="guest__copyright">
        <div class="copyright__container">
            <small class="copyright__text">© Hak Cipta 2026 - Bideyesa</small>
            <span class="copyright__separator">|</span>
            <small class="copyright__text">Konten terakhir dimutakhirkan Februari 2026</small>
        </div>
    </section>
    
</x-layout.app>