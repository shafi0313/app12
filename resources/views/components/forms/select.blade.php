<div class="mb-3">
    @isset($label)
        @php
            $label = str_replace('*', '<span class="text-danger">*</span>', $label);
            $label = capitalizeWithoutPrepositions($label);
        @endphp
        <label for="{{ $id }}" class="form-label">{!! $label !!}</label>
    @endisset

    @php
        $optionName = ucfirst(str_replace('id', '', str_replace('_', ' ', $name)));
    @endphp

    <select id="{{ $id }}" name="{{ $name }}" {{ $attributes->merge(['class' => 'form-select']) }}>
        <option value="">Select {{ $optionName }}</option>
        @foreach ($options as $key => $value)
            <option value="{{ $key }}"
                @isset($edit)
                    @if (old($name, $edit->$name ?? null) == $key) selected @endif
                @else
                    @if (old($name) == $key) selected @endif
                @endisset>
                {{ $value }}
            </option>
        @endforeach
    </select>
</div>
