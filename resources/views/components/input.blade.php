<div class="input{{ $class }}">
    
    {{-- Label --}}
    @if ($label)
        <label class="input__label" for="{{ $id }}">
            <span class="label__tag">{{ $label }}</span>
            @if($required)
                <span class="label__required">*</span>
            @endif
        </label>
    @endif
    
    {{-- Type --}}
    <div class="input__type">
        @switch($type)
            @case('search')
                <div class="search{{ $errors->has($name) ? ' error' : '' }}">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input
                        type="search"
                        name="{{ $name }}"
                        id="{{ $id }}"
                        value="{{ old($name, $value) }}"
                        @if($placeholder) placeholder="{{ $placeholder }}" @endif
                        @if($autocomplete) autocomplete="{{ $autocomplete }}" @endif
                        @if($autofocus) autofocus @endif
                        @if($wire) wire:model="{{ $wire }}" @endif
                        {{ $attributes }}
                        >
                    <i class="fa-solid fa-xmark"></i>
                </div>
                @break
             @case('select')
                <div class="select{{ $errors->has($name) ? ' error' : '' }}">
                    <select
                        name="{{ $name }}"
                        id="{{ $id }}"
                        @if($wire) wire:model="{{ $wire }}" @endif
                        {{ $attributes }}
                        >
                        @if($placeholder) <option value="" selected>{{ $placeholder }}</option> @endif
                        @foreach ($options as $key => $option)
                            <option value="{{ $key }}" @selected($key === old($name, $value))>{{ $option }}</option>
                        @endforeach
                    </select>
                    <i class="fa-solid fa-angle-down"></i>
                </div>
                @break
            @case('checkbox')
                <div class="checkbox{{ $errors->has($name) ? ' error' : '' }}">
                    <input type="hidden" name="{{ $name }}" value="">
                    @foreach ($options as $key => $option)
                        <label class="checkbox__item">
                            <input
                                type="checkbox"
                                name="{{ $name }}[{{ $key }}]"
                                id="{{ $id }}-{{ $key }}" 
                                value="{{ $key }}"
                                @if($wire) wire:model="{{ $wire }}.{{ $key }}" @endif
                                @checked(in_array($key, (array) old($name, json_decode($value ?? '[]', true))))
                                {{ $attributes }}
                                >{{ $option }}
                        </label>
                    @endforeach
                </div>
                @break
            @default
                <input
                    class="{{ $errors->has($name) ? 'error' : '' }}"
                    type="{{ $type }}"
                    name="{{ $name }}"
                    id="{{ $id }}"
                    value="{{ old($name, $value) }}"
                    @if($placeholder) placeholder="{{ $placeholder }}" @endif
                    @if($autocomplete) autocomplete="{{ $autocomplete }}" @endif
                    @if($autofocus) autofocus @endif
                    @if($wire) wire:model="{{ $wire }}" @endif
                    {{ $attributes }}
                    >
        @endswitch
    </div>
    
    {{-- Error --}}
    @error($name)
        <span class="input__error">{{ $message }}</span>
    @enderror
    
</div>