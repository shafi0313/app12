<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" {{ $attributes->merge(['class' => 'btn ']) }}>{{ $text }}</button>
</div>

{{-- Example --}}
{{-- <x-ui.modal-footer class="btn-primary" text="Submit" /> --}}
