<x-layout.app class="superadmin">
    
    {{-- Navigation --}}
    <section class="superadmin__navigation">
        <div class="navigation__container">
            
            {{-- Banner --}}
            <a href="{{ route('guest.index') }}">
                <img src="{{ asset('assets/img/sportism-logo-round.png') }}" alt="Sportism Logo" class="navigation__banner">
            </a>
            
            {{-- Menu --}}
            <div class="navigation__menu">
                <a href="{{ route('superadmin.index') }}" class="menu__item{{ request()->routeIs('superadmin.index') ? ' active' : null }}">Home</a>
                <a href="{{ route('superadmin.event.index') }}" class="menu__item{{ request()->routeIs('superadmin.event.*') ? ' active' : null }}">Event</a>
                <a href="{{ route('superadmin.club.index') }}" class="menu__item{{ request()->routeIs('superadmin.club.*') ? ' active' : null }}">Club</a>
            </div>
            
        </div>
    </section>
    
    {{-- Slot --}}
    <section class="superadmin__layout{{ $class }}">
        {{ $slot }}
    </section>
    
</x-layout.app>