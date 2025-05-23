<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="mb-0">{{ $title }}</h4>
            <ol class="breadcrumb mb-0">
                @if (!empty($breadcrumbs))
                    @foreach ($breadcrumbs as $breadcrumb)
                        <li class="breadcrumb-item {{ $loop->last ? 'active' : '' }}">{{ $breadcrumb }}</li>
                    @endforeach
                @endif
            </ol>
        </div>
    </div>
</div>
