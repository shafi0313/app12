@php
    $title = 'My Profile';
    $route = 'admin.users.';
@endphp
<x-layouts.app :title="$title">
    <x-shared.breadcrumb :title="$title" />
    <style>
        .required::after {
            content: ' *';
            color: red;
        }
    </style>
    @php
        $user = user();
    @endphp

    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="text-center">
                        <img src="{{ getProfileImg() }}" class="rounded-circle" width="100" alt="">
                        <h4 class="mt-2">Name: {{ $user->name }}</h4>
                        <p class="text-muted text-sm mb-0">Email: {{ $user->email }}</p>
                        <p class="text-muted text-sm mb-0">Phone: {{ $user->phone_number }}</p>
                        <p class="text-muted text-sm mb-0">Address: {{ $user->address }}</p>
                    </div>
                    <h4>Logged in Sessions</h4>
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <table class="table table-hover table-striped mt-3">
                        @foreach ($sessions as $session)
                            <tr>
                                <td>{{ $session->ip_address }}</td>
                                <td>{{ getBrowser($session->user_agent) }} ({{ getOS($session->user_agent) }})</td>
                                <td>{{ Carbon\Carbon::createFromTimestamp($session->last_activity)->diffForHumans() }}
                                </td>
                                <td>
                                    <form action="{{ route('admin.my_profiles.session_logout') }}" method="post">
                                        @csrf
                                        <input name="session_id" value="{{ $session->id }}" hidden>
                                        <button type="submit" class="btn btn-warning btn-sm">Logout</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="4" class="text-end">
                                <form action="{{ route('admin.my_profiles.all_session_logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Logout All Device</button>
                                </form>
                            </td>
                        </tr>
                    </table>
                    <hr>
                </div>

                <x-forms.form ajax="true" action="{{ route('admin.my_profiles.store') }}" img="true">
                    <div class="row mt-3 justify-content-center">
                        <div class="col-md-5">
                            <x-forms.input name="name" :edit="$user" label="Name *" />
                            <x-forms.input type="email" name="email" :edit="$user" label="email *" disabled />
                            <x-forms.input name="phone_number" :edit="$user" label="phone *" />
                            <x-forms.input type="file" name="image" label="image " />
                            <x-forms.input name="address" :edit="$user" label="address *" />
                            <hr>
                            <h4 class="fw-bold">Change Password:</h4>
                            <x-forms.input type="password" name="password" label="current Password" />
                            <x-forms.input type="password" name="new_password" label="New Password" />
                            <x-forms.input type="password" name="confirm_password" label="Confirm Password" />
                        </div>

                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-4 text-center">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </x-forms.form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#password').on('input', function() {
                    if ($(this).val().length > 0) {
                        $('#new_password').attr('required', true);
                        $('#confirm_password').attr('required', true);
                        $('label[for="new_password"], label[for="confirm_password"]').addClass('required');
                    } else {
                        $('#new_password').attr('required', false);
                        $('#confirm_password').attr('required', false);
                        $('label[for="new_password"], label[for="confirm_password"]').removeClass('required');
                    }
                });
            });
        </script>
    @endpush
</x-layouts.app>
