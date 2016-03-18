<fieldset>
    <legend>
        Business Information
    </legend>
    {!! BootForm::text('Company Name', 'company_name') !!}
    {!! BootForm::text('Courier', 'courier') !!}
</fieldset>
<fieldset>
    <legend>
        Personal Information
    </legend>
    {!! BootForm::text('Name', 'name') !!}
    {!! BootForm::text('Phone', 'phone') !!}
    {!! BootForm::email('Email', 'email') !!}
    {!! BootForm::textarea('Address', 'address')->rows(3) !!}
</fieldset>
<button type="submit" class="btn btn-primary pull-right">
    <i class="fa fa-save"></i> Save
</button>