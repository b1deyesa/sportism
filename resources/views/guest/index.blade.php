<x-layout.guest class="home">
    
    {{-- Banner --}}
    <section class="banner">
        <div class="banner__container">
            <img src="{{ asset('assets/img/default.png') }}" alt="" class="banner__background">
            <h1 class="banner__title">Welcome to</h1>
            <h1 class="banner__subtitle">Sportism Media</h1>
        </div>
    </section>
    
    {{-- Event --}}
    <section class="event">
        <div class="event__container">
            <div class="event__header">
                <h2 class="header__title">Event</h2>
                <x-button type="link" href="" class="header__button">See All</x-button>
            </div>
            <div id="event__splide" class="splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach ($events as $event)
                            <li class="splide__slide">
                                <span class="item__status">{{ $event->status }}</span>
                                <img src="{{ asset($event->cover ? 'storage/'. $event->cover : 'assets/img/default.png') }}" alt="Event Cover" class="item__cover">
                                <div class="item__bottom">
                                    <h3 class="item__title">{{ $event->name }}</h3>
                                    <div class="item__date">
                                        <span class="date__start">{{ format_date($event->date_start, 'j F') }}</span>
                                        <span class="date__separator">-</span>
                                        <span class="date__end">{{ format_date($event->date_end) }}</span>
                                    </div>
                                    <div class="item__buttons">
                                        <x-modal class="item__button__regist" :close="false">
                                            <x-slot:trigger>Regist</x-slot:trigger>
                                            @auth
                                                @livewire('admin.event.regist', compact('event'))
                                            @endauth
                                            @guest
                                                @livewire('guest.login')
                                            @endguest
                                        </x-modal>
                                        <x-button type="link" href="" class="item__button__detail"><i class="fa-solid fa-eye"></i></x-button>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
</x-layout.guest>