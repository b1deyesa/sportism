@switch($type)
    @case('link')
        <a 
            class="button{{ $class }}"
            href="{{ $href }}"
            target="{{ $target }}"
            {{ $attributes }}
            >{{ $slot }}</a>
        @break
    @default
        <button
            class="button{{ $class }}"
            type="{{ $type }}"
            {{ $attributes }}
            >{{ $slot }}</button>
@endswitch