<div class="player__read">
    
    {{-- Header --}}
    <div class="player__header">
        <h2 class="header__title">Players</h2>
        <div class="header__action">
            <x-input type="search" placeholder="Search player here.." />
            <x-modal class="player__create" :close="false">
                <x-slot:trigger><i class="fa-solid fa-plus"></i>Add Player</x-slot:trigger>
                @livewire('superadmin.player.create', compact('team'))
            </x-modal>
        </div>
    </div>
    
    {{-- List --}}
    <div class="player__list">
        @foreach ($players as $player)
            <div class="list__item">
                <div class="item__left">
                    <img src="{{ asset($player->avatar ? 'storage/'. $player->avatar : 'assets/img/default-avatar.png') }}" alt="Player Avatar" class="item__avatar">
                    <h3 class="item__title">{{ $player->name }}</h3>
                </div>
            </div>
        @endforeach
    </div>
    
</div>