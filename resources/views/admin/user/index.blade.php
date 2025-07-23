@php
    $dir = 'user';
    $title = ucfirst($dir) . 's';
    $route = 'admin.' . $dir . 's.';
@endphp
<x-layouts.app :title="$title">
    <x-shared.breadcrumb :title="$title" :breadcrumbs="['Admin', ucfirst($dir)]" />

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">List of {{ $title }}</h5>
            <x-ui.modal-add-button />
        </div>
        <div class="card-body">
            <table id="data_table" class="table table-bordered table-hover table-striped">
                <thead></thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    @include('admin.' . $dir . '.create', ['title' => $title, 'route' => $route])

    @push('scripts')
        <script>
            $(function() {
                const table = $('#data_table').DataTable({
                    processing: true,
                    serverSide: true,
                    deferRender: true,
                    scrollX: true,
                    scrollY: 400,
                    ordering: true,
                    ajax: "{{ route($route . 'index') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            title: 'SL',
                            className: 'text-center',
                            width: '17px',
                            searchable: false,
                            orderable: false,
                        },
                        {
                            data: 'role',
                            name: 'role',
                            title: 'Role',
                            searchable: false,
                            orderable: false,
                        },
                        {
                            data: 'name',
                            name: 'name',
                            title: 'Name',
                        },
                        {
                            data: 'email',
                            name: 'email',
                            title: 'Email',
                        },
                        {
                            data: 'phone_number',
                            name: 'phone_number',
                            title: 'Phone Number',
                        },
                        {
                            data: 'image',
                            name: 'image',
                            title: 'Image',
                            className: 'text-center',
                            searchable: false,
                            orderable: false,
                        },
                        {
                            data: 'is_active',
                            name: 'is_active',
                            title: 'Status',
                            className: 'text-center',
                            searchable: false,
                            orderable: false,
                        },
                        {
                            data: 'action',
                            name: 'action',
                            title: 'Action',
                            className: 'text-center',
                            width: '80px',
                            searchable: false,
                            orderable: false,
                        },
                    ],
                    order: [
                        [2, 'asc']
                    ],
                    scroller: {
                        loadingIndicator: true,
                    },
                });
            });
        </script>
    @endpush
</x-layouts.app>
