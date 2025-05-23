@props([
    'type' => 'button',
    'class' => '',
    'text' => '',
])
<div>
    <button class="btn btn-primary btn-lg fw-medium {{ $class }}" type="{{ $type }}">
        {{ $text }}
    </button>
</div>

{{-- Example --}}
{{-- <x-button text="Submit" /> --}}