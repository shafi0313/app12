<x-ui.modal id="createModal" title="Add {{ $title }}">
    <x-forms.form :modal="'create'" action="{{ route($route . 'store') }}" img="true">
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <x-forms.select name="role" label="Role *" :options="config('var.roles')" />
                </div>
                <div class="col-md-6">
                    <x-forms.input name="name" label="Name *" />
                </div>
                <div class="col-md-6">
                    <x-forms.input name="email" label="Email *" />
                </div>
                <div class="col-md-6">
                    <x-forms.input type="file" name="image" label="Image" />
                </div>
                <div class="col-md-6">
                    <x-forms.input type="password" name="password" label="Password *" />
                </div>
                <div class="col-md-6">
                    <x-forms.input type="password" name="password_confirmation" label="Confirm Password *" />
                </div> 
            </div>            
        </div>
        <x-ui.modal-footer class="btn-primary" />
    </x-forms.form>
</x-ui.modal>
