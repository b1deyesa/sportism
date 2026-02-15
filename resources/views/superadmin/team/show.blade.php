<x-layout.superadmin class="team show">
    
    {{-- Header --}}
    <div class="team__header">
        <img src="{{ asset('assets/img/default-logo.png') }}" alt="Team Logo" class="header__logo">
        <div class="header__info">
            <h1 class="info__title">{{ $team->name }}</h1>
            <h2 class="info__subtitle">{{ $team->club->name }}</h2>
        </div>
    </div>
    
    {{-- Content --}}
    <div class="team__content" x-data="{ tab: 'player' }">
        
        {{-- Tab --}}
        <div class="tab">
            {{-- <span class="tab__item" :class="{ 'active': tab==='overview' }" x-on:click="tab='overview'">Overview</span> --}}
            <span class="tab__item" :class="{ 'active': tab==='player' }" x-on:click="tab='player'">Player</span>
            {{-- <span class="tab__item">Fixture</span> --}}
            {{-- <span class="tab__item">Achievement</span> --}}
        </div>
        
        {{-- Panel --}}
        <div class="panel">
            
            {{-- Overview --}}
            <div class="panel__overview" x-show="tab==='overview'">
                <div class="overview__form">
                    <h3 class="form__title">Team Form</h3>
                    <div class="form__list">
                        <div class="list__item">
                            <span class="item__score">20 - 10</span>
                            <img src="{{ asset('assets/img/default-logo.png') }}" alt="Team Logo" class="item__logo">
                        </div>
                        <div class="list__item">
                            <span class="item__score">2 - 1</span>
                            <img src="{{ asset('assets/img/default-logo.png') }}" alt="Team Logo" class="item__logo">
                        </div>
                        <div class="list__item">
                            <span class="item__score">2 - 1</span>
                            <img src="{{ asset('assets/img/default-logo.png') }}" alt="Team Logo" class="item__logo">
                        </div>
                        <div class="list__item">
                            <span class="item__score">2 - 1</span>
                            <img src="{{ asset('assets/img/default-logo.png') }}" alt="Team Logo" class="item__logo">
                        </div>
                    </div>
                </div>
                <div class="overview__next">
                    <div class="next__header">
                        <h3 class="header__title">Next Match</h3>
                        <span class="header__event">PT Penabur Computech</span>
                    </div>
                    <div class="next__team">
                        <div class="team__item">
                            <img src="{{ asset('assets/img/default-logo.png') }}" alt="Team Logo" class="item__logo">
                            <span class="item__title">{{ $team->name }}</span>
                        </div>
                        <div class="team__schedule">
                            <span class="schedule__time">08.30</span>
                            <span class="schedule__date">18 Jan</span>
                        </div>
                        <div class="team__item">
                            <img src="{{ asset('assets/img/default-logo.png') }}" alt="Team Logo" class="item__logo">
                            <span class="item__title">Nama Lawannya</span>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- Player --}}
            <div class="panel__player" x-show="tab==='player'">
                @livewire('superadmin.player.read', compact('team'))
            </div>
            
        </div>
        
    </div>
    
</x-layout.superadmin>