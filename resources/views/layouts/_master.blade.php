<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="csrf-param" content="_token"/>

    <title>{{ $storeName or 'Cloud Based POS' }} | inertiaPOS</title>

    <!-- Vendor styles -->
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <!-- Application styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="{{ asset('js/jquery.js') }}"><\/script>')</script>
    <!-- Application scripts -->
    <script src="{{ asset('js/all.js') }}"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('layouts.includes._header')

    @include('layouts.includes._aside')

            <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('page-header', 'Page Header')
                {{--<small>Optional description</small>--}}
            </h1>
            {!! Breadcrumbs::render() !!}
        </section>

        <!-- Main content -->
        <section class="content">

            @yield('content')

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('layouts.includes._footer')
</div>
<!-- ./wrapper -->
@yield('footer-scripts')
</body>
</html>