@extends('layouts._master')

@section('page-header')
    Customers
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <a href="{{ route('customers.create') }}" class="btn btn-primary pull-right">
                        <i class="fa fa-plus-circle"></i> Create Customer
                    </a>
                </div>
                <div class="box-body">
                    {!! $dataTable->table(['class' => 'table table-condensed table-bordered table-hover dt-responsive']) !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer-scripts')
    {!! $dataTable->scripts() !!}
@append