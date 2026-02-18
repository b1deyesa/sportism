<x-layout.superadmin class="event show">
    
    {{-- Header --}}
    <div class="event__header">
        <h1 class="header__title">Event</h1>
        <hr class="header__separator">
        <h2 class="header__subtitle">{{ $event->name }}</h2>
    </div>
    
    {{-- Detail --}}
    <div class="event__detail">
        @livewire('superadmin.event.detail', compact('event'))
        
    </div>
    
    {{-- Category --}}
    <div class="event__category">
        <div class="category__header">
            <h2 class="header__title">Category</h2>
            <x-modal class="category__create" :close="false">
                <x-slot:trigger><i class="fa-solid fa-plus"></i></x-slot:trigger>
                @livewire('superadmin.category.create', compact('event'))
            </x-modal>
        </div>
        @livewire('superadmin.category.read', compact('event'))
    </div>
    
</x-layout.superadmin>