<x-layout.superadmin class="team">
    
    {{-- Header --}}
    <div class="team__header">
        <h1 class="header__title">Teams</h1>
        <hr class="header__separator">
        <h2 class="header__subtitle">{{ $club->name }}</h2>
        <x-modal class="team__create" :close="false">
            <x-slot:trigger>Create</x-slot:trigger>
            @livewire('superadmin.team.create', compact('club'))
        </x-modal>
    </div>
    
    {{-- Read --}}
    @livewire('superadmin.team.read', compact('club'))
    
</x-layout.superadmin>