@php
    $modal = $modal ?? false;
    $ajax = $ajax ?? false;
    $img = $img ?? false;
    $action = $action ?? '';
    $method = $method ?? 'POST';    
@endphp
<form
    @if ($modal) onsubmit="ajaxStoreModal(event, this, '{{ $modal == 'create' ? 'createModal' : 'editModal' }}')" 
    @elseif($ajax) 
    onsubmit="ajaxStore(event, this)" @endif
    action="{{ $action }}" method="{{ $method == 'GET' ? 'GET' : 'POST' }}"
    @if ($img) enctype="multipart/form-data" @endif >
    @csrf
    @if ($method != 'GET' && $method != 'POST')
        @method($method)
    @endif
    {{ $slot }}
</form>
