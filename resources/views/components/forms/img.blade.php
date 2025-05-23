<div class="mb-3">
    <span class="form-label">Old {{ ucfirst($name) }}</span>
    <img src="{{ getImgUrl($dir, $edit->$name) }}" alt="{{ ucfirst($name) }}" width="100" class="img-thumbnail">
</div>

{{-- Example --}}
{{-- <x-forms.img dir="user" name="image" :edit="$user" /> --}}