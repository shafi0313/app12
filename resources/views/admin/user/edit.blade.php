    <x-ui.modal id="editModal" title="Edit User">
        <x-forms.form modal="edit" action="{{ route('admin.users.update', $user->id) }}" method="PUT" img="true">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <x-forms.select name="role" label="Role *" :options="config('var.roles')" :edit="$user" />
                    </div>
                    <div class="col-md-6">
                        <x-forms.input name="name" label="Name *" :edit="$user" />
                    </div>
                    <div class="col-md-6">
                        <x-forms.input name="email" label="Email *" :edit="$user" />
                    </div>
                    <div class="col-md-6">
                        <x-forms.img dir="user" name="image" :edit="$user" />
                    </div>
                    <div class="col-md-6">
                        <x-forms.input type="file" name="image" label="Image" />
                    </div>
                    <div class="col-md-6">
                        <x-forms.input type="password" name="password" label="Password " />
                    </div>
                    <div class="col-md-6">
                        <x-forms.input type="password" name="password_confirmation" label="Confirm Password " />
                    </div>
                </div>
            </div>
            <x-ui.modal-footer class="btn-primary" />
        </x-forms.form>
    </x-ui.modal>
