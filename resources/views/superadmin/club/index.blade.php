<x-layout.superadmin class="club index">
    
    {{-- Header --}}
    <div class="club__header">
        <h1 class="header__title">Clubs</h1>
        <x-modal class="club__create" :close="false">
            <x-slot:trigger>Create</x-slot:trigger>
            @livewire('superadmin.club.create')
        </x-modal>
    </div>
    
    {{-- Read --}}
    @livewire('superadmin.club.read')
    
</x-layout.superadmin>