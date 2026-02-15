<form
    class="form{{ $class }}" 
    @if($id) id="{{ $id }}" @endif 
    action="{{ $action }}" 
    method="{{ $method }}" 
    @if($enctype) enctype="{{ $enctype }}" @endif
    {{ $attributes }}
    >
    @if ($method !== 'GET') @csrf @endif
    @if ($method_name) @method($method_name) @endif
    {{ $slot }}
</form>