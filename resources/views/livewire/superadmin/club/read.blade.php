<div class="club__read">
    
    {{-- List --}}
    <div class="club__list" x-data="{ active: null }">
        @foreach ($clubs as $club)
            <span>
                <span class="list__item">
                    <img src="{{ asset($club->logo ? 'storage/'. $club->logo : 'assets/img/default-logo.png') }}" alt="Club Background" class="item__background">
                    <div class="item__left">
                        <img src="{{ asset($club->logo ? 'storage/'. $club->logo : 'assets/img/default-logo.png') }}" alt="Club Logo" class="item__logo">
                        <h3 class="item__title">{{ $club->name }}</h3>
                    </div>
                    <div class="item__right">
                        <x-modal class="team__create" :close="false">
                            <x-slot:trigger><i class="fa-solid fa-plus"></i>Add Team</x-slot:trigger>
                            @livewire('superadmin.team.create', compact('club'))
                        </x-modal>
                        <x-button class="item__view" x-on:click="active === {{ $club->id }} ? active = null : active = {{ $club->id }}">View Teams</x-button>
                    </div>
                </span>
                <div class="team__list" x-show="active === {{ $club->id }}" x-cloak>
                    @forelse ($club->teams as $team)
                        <span class="list__item">
                            <h3 class="item__title">{{ $team->name }}</h3>
                            <x-button type="link" href="{{ route('superadmin.team.show', compact('team')) }}" class="item__visit">Team Detail<i class="fa-solid fa-angle-right"></i></x-button>
                        </span>
                    @empty
                        <span class="list__item empty">No Team</span>
                    @endforelse
                </div>
            </span>
        @endforeach
    </div>
    
</div>