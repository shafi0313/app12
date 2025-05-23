@php
    $modal = $modal ?? false;
    $ajax = $ajax ?? false;
    $img = $img ?? false;
    $action = $action ?? '';
    $method = $method ?? 'POST';
@endphp
{{-- Form Component --}}
{{-- 
    $modal: 'create' or 'edit' for modal forms
    $ajax: true for ajax forms
    $img: true for forms with file upload
    $action: form action URL
    $method: form method (GET, POST, PUT, DELETE)
    $slot: form fields
--}}
<form
    @if ($modal) onsubmit="ajaxStoreModal(event, this, '{{ $modal == 'create' ? 'createModal' : 'editModal' }}')" 
    @elseif($ajax) 
    onsubmit="ajaxStore(event, this)" @endif
    action="{{ $action }}" method="{{ $method == 'GET' ? 'GET' : 'POST' }}"
    @if ($img) enctype="multipart/form-data" @endif>
    @csrf
    @if ($method != 'GET' && $method != 'POST')
        @method($method)
    @endif
    {{ $slot }}
</form>

{{-- Example --}}
{{-- <x-forms.form :modal="'create'" action="{{ route($route . 'store') }}" img="true">
</x-forms.form> --}}
