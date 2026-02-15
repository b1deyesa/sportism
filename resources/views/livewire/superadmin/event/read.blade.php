<div class="event__read">
    
    {{-- List --}}
    <div class="event__list" wire:ignore x-data x-init="new Sortable($el,{animation:150,handle:'.item__handle',onEnd(){let orders=[...$el.children].map((el,index)=>({id:el.dataset.id,order:index}));$wire.updateOrder(orders)}})">        
        @forelse ($events as $event)
            <div class="list__item" data-id="{{ $event->id }}" wire:key="event-{{ $event->id }}">
                <div class="item__left">
                    <img src="{{ asset('assets/img/default.png') }}" alt="Cover" class="item__cover">
                    <div class="item__text">
                        <h4 class="item__title">{{ $event->name }}</h4>
                        <div class="item__bottom">
                            <small class="item__status">{{ $event->status }}</small>
                            <small class="item__date">{{ format_date($event->date_start) }} - {{ format_date($event->date_end) }}</small>
                        </div>
                    </div>
                </div>
                <div class="item__right">
                    <span wire:ignore>
                        <x-modal class="event__edit" :close="false">
                            <x-slot:trigger><i class="fa-solid fa-pencil"></i></x-slot:trigger>
                            @livewire('superadmin.event.edit', compact('event'), key('edit-'.$event->id))
                        </x-modal>
                    </span>
                    <span wire:ignore>
                        <x-modal class="event__delete" :close="false">
                            <x-slot:trigger><i class="fa-solid fa-trash"></i></x-slot:trigger>
                            @livewire('superadmin.event.delete', compact('event'), key('delete-'.$event->id))
                        </x-modal>
                    </span>
                    <x-button type="link" href="{{ route('superadmin.event.show', compact('event')) }}" class="event__visit">See Detail<i class="fa-solid fa-angle-right"></i></x-button>
                    <span class="item__handle">⠿</span>
                </div>
            </div>
        @empty
            <span class="empty">No Data</span>
        @endforelse
    </div>
    
</div>