<div class="category__read">
    
    {{-- List --}}
    <div class="category__list">
        @foreach ($categories as $category)
            <span class="list__item{{ $selected_category == $category->id ? ' active' : '' }}" wire:click="selectCategory({{ $category->id }})">{{ $category->name }}</span>
        @endforeach
    </div>
    
    {{-- Team --}}
    <div class="category__team">

         {{-- List --}}
         <div class="team__list">
            @if($this->category)
                @foreach ($this->category->teams as $team)
                    <span class="list__item{{ $selected_team == $team->id ? ' active' : '' }}" wire:click="selectTeam({{ $team->id }})">
                        <img src="{{ asset($team->logo ? 'storage/'. $team->logo : 'assets/img/default-logo.png') }}" alt="Team Logo" class="item__logo">
                        <h3 class="item__title">{{ $team->name }}</h3>
                        <x-modal class="team__remove" :close="false">
                            <x-slot:trigger><i class="fa-solid fa-xmark"></i></x-slot:trigger>
                            <span class="team">
                                <p class="team__text">Are you sure to remove this team?</p>
                                <x-form wire:submit="removeTeam({{ $team->id }})">
                                    <div class="form__buttons">
                                        <x-button class="button__close" x-on:click="open = false">Close</x-button>
                                        <x-button type="submit" class="button__submit">Remove</x-button>
                                    </div>
                                </x-form>
                                
                            </span>
                        </x-modal>
                    </span>
                @endforeach
                @auth
                    <x-modal class="team__create" :close="false">
                        <x-slot:trigger><i class="fa-solid fa-plus"></i></x-slot:trigger>
                        <x-form class="team__form" wire:submit="addTeam">
                            <x-input label="Team Name" type="select" wire="team_id" placeholder="Select" :options="$teams" />
                            <div class="form__buttons">
                                <x-button class="button__close" x-on:click="open = false">Close</x-button>
                                <x-button type="submit">Save</x-button>
                            </div>
                        </x-form>
                    </x-modal>
                @endauth
            @endif
        </div>
        
        {{-- Separator --}}
        <hr class="team__separator">
        
        {{-- Info --}}
        <div class="team__info">
            @if($this->team)
                <h2 class="info__title">{{ $this->team->name }}</h2>
                <div class="info__player">
                    <div class="player__header">
                        <h2 class="header__title">Player</h2>
                        {{-- <x-modal class="player__create" :close="false">
                            <x-slot:trigger><i class="fa-solid fa-plus"></i></x-slot:trigger>
                            <x-form class="player__form" wire:submit="savePlayer">
                                <x-input label="Player Name" type="text" wire="name" />
                                <div class="form__buttons">
                                    <x-button class="button__close" x-on:click="open = false">Close</x-button>
                                    <x-button type="submit">Save</x-button>
                                </div>
                            </x-form>
                        </x-modal> --}}
                    </div>
                    @if($this->team)
                        <div class="player__list">
                            @foreach ($this->team->players as $player)
                                <span class="list__item">
                                    <img src="{{ asset($player->avatar ? 'storage/'. $player->avatar : 'assets/img/default-avatar.png') }}" alt="Player Avatar" class="item__avatar">
                                    <h3 class="item__title">{{ $player->name }}</h3>
                                </span>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endif
        </div>
        
    </div>    
    
</div>
