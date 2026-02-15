<div class="team__read">
    
    {{-- List --}}
    <div class="team__list">
        @foreach ($teams as $team)
            <div class="list__item">
                <img src="{{ asset('assets/img/default-logo.png') }}" alt="Team Logo" class="item__logo">
                <h3 class="item__title">{{ $team->name }}</h3>
            </div>
        @endforeach
    </div>
    
</div>