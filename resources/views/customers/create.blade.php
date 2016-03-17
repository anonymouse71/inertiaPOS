@extends('layouts._master')

@section('page-header')
    Create Customers
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="col-sm-7">
                        <?php $columnSizes = ['sm' => [4, 8]]; ?>
                        {!! BootForm::openHorizontal($columnSizes)->post()->action(route('customers.store')) !!}
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
                        {!! BootForm::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer-scripts')

@append