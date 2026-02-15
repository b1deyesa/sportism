<x-layout.superadmin class="event index">
    
    {{-- Header --}}
    <div class="event__header">
        <h1 class="header__title">Events</h1>
        <x-modal class="event__create" :close="false">
            <x-slot:trigger>Create</x-slot:trigger>
            @livewire('superadmin.event.create')
        </x-modal>
    </div>
    
    {{-- Read --}}
    @livewire('superadmin.event.read')
    
</x-layout.superadmin>