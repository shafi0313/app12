<div class="mb-3">
    {{-- @props(['route', 'icon', 'text', 'active']) --}}
    @php
        $id = $id ?? ($name ?? '');
        $type = $type ?? 'text';
        // $name = $name ?? '';
        // $label = $label ?? '';
        // $placeholder = $placeholder ?? '';
        // $value = $value ?? old($name, $edit->{$name} ?? '');
        // $required = $required ?? false;
        // $isRequired = false;
    @endphp
    @if ($label)
        @php
            $label = str_replace('*', '<span class="text-danger">*</span>', $label);
            $label = capitalizeWithoutPrepositions($label);
            $isRequired = strpos($label, '*') !== false; // Check if '*' is present
        @endphp
        <label for="{{ $id }}" class="form-label">{!! $label !!}</label>
    @endif
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}"
        {{ $attributes->merge(['class' => 'form-control ' . ($errors->has($name) ? 'is-invalid' : '')]) }}
        placeholder="{{ $placeholder }}"
        @if (isset($value)) value="{{ $value }}" 
        @elseif ($type !== 'file') 
            value="{{ old($name, $edit->{$name} ?? '') }}" @endif
        @if ($isRequired) required @endif />

    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
