<div x-data="{ open: false, id: Math.random().toString(36).substring(2, 12) }" x-on:open-modal.window="if ($event.detail === id) { open = true } else { open = false }" @click.outside.stop x-on:modal-close.window="open = false" {{ $attributes }}>

    {{-- Trigger --}}
    <span x-on:click="window.dispatchEvent(new CustomEvent('open-modal', { detail: id }));" class="{{ $class }}__trigger">{{ $trigger }}</span>
    
    {{-- Content --}}
    <template x-teleport="body">
        <div class="modal" x-show="open" x-transition:enter.opacity x-transition:leave.opacity.duration.500ms @click.stop x-cloak>
            <div class="modal__container{{ $class ? " $class" : null }}" x-show="open" x-transition:enter.duration.500ms @click.stop>
                @if ($close)
                    <span x-on:click="open = false" class="modal__close"><i class="fa-solid fa-xmark"></i></span>
                @endif
                {{ $slot }}
            </div>
        </div>
    </template>
    
</div>