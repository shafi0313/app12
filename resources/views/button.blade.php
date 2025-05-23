<style>
    ._btn {
        border: none !important;
        background: none;
        font-size: 17px;
        margin: 0 !important;
        padding-top: 0 !important;
        padding-bottom: 0 !important;
        line-height: 1px !important;
    }
</style>


@switch($type)
    @case('ajax-edit')
        <button data-route="{{ route($route . '.edit', $row->id) }}" data-value="{{ $row->id }}" onclick="ajaxEdit(this)"
            class='text-primary _btn' title="@lang('Edit')">
            <iconify-icon icon="tabler:edit" class="fs-25" style="color: #0023ff"></iconify-icon>
        </button>
        @break

    @case('ajax-delete')
        <button data-route="{{ route($route . '.destroy', $row->id) }}" data-value="{{ $row->id }}"
            onclick="ajaxDelete(this, '{{ $src ?? null }}')" class='text-danger _btn' title="@lang('Delete')">
            <iconify-icon icon="tabler:trash-x-filled" class="fs-25" style="color: #fd2f2f"></iconify-icon>
        </button>
        @break

    @case('active')
        <span data-route="{{ route($route . '.active_status', $row->id) }}" data-value="{{ $row->is_active }}"
            onclick="changeStatusPatch(this)" style="cursor: pointer;">
            @if ($row->is_active == 1)
                <iconify-icon icon="fa6-solid:toggle-on" width="2.25em" height="2em"  style="color: #17a497"></iconify-icon>
            @else
                <iconify-icon icon="fa6-solid:toggle-off" width="2.25em" height="2em" style="color: #fd2f2f"></iconify-icon>
            @endif
        </span>
        @break

    @case('edit')
        <a href="{{ route($route . '.edit', $row->id) }}" class='text-primary _btn' title="@lang('Edit')">
            <iconify-icon icon="tabler:edit" class="fs-25" style="color: #0023ff"></iconify-icon>
        </a>
        @break

    @case('delete')
        <button data-route="{{ route($route . '.destroy', $row->id) }}" class='_delete text-danger _btn'
            title="@lang('Delete')">
            <i class='fa fa-trash'></i>
        </button>
        @break

    @case('view')
        <a href="{{ route($route . '.show', $row->id) }}" class='text-secondary _btn' title="@lang('Show-details')">
            <i class='fa fa-eye'></i>
        </a>
        @break
@endswitch


{{-- @if ($type == 'status')
    <span data-route="{{$route}}"
        style="font-size: 36px;line-height: 1;vertical-align: middle;cursor: pointer;" data-bs-placement="top" data-bs-toggle="tooltip"  data-bs-original-title="@lang('Status')"
        data-value="{{$row->status}}"
        onclick="changeStatus(this)" title="@lang('Status')">
        @if ($row->status == 1)
        <i class="fa fa-toggle-on text-success" title="Published"></i>
        @else
        <i class="fa fa-toggle-off text-danger" title="Unpublished"></i>
        @endif
    </span>
@endif --}}



@if ($type == 'toggle-btn')
    <label class="custom-switch form-switch mb-0" data-route="{{ $route }}" data-value="{{ $row->status }}"
        onclick="changeStatus(this)">
        <input {{ $row->status == 1 ? 'checked' : '' }} type="checkbox" name="switch" class="custom-switch-input">
        <span class="custom-switch-indicator custom-switch-indicator-md"></span>
    </label>
@endif
