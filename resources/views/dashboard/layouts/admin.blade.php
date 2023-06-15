<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection={{ app()->getLocale() === 'ar' ? 'ltr' : 'rtl' }}>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords"
        content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title> {{ $title }} </title>
    <link rel="apple-touch-icon" href="{{ asset('dashboard/app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('dashboard/app-assets/images/ico/favicon.ico') }}">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
        rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('dashboard/app-assets/css' . getFolder() . '/vendors.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/css' . getFolder() . '/app.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('dashboard/app-assets/css' . getFolder() . '/custom' . getFolder() . '.css') }}">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('dashboard/app-assets/css' . getFolder() . '/core/menu/menu-types/vertical-menu-modern.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('dashboard/app-assets/css' . getFolder() . '/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('dashboard/app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/vendors/css/charts/morris.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('dashboard/app-assets/fonts/simple-line-icons/style.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('dashboard/app-assets/css' . getFolder() . '/core/colors/palette-gradient.css') }}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    {{-- @php if(app()->getLocale() === "ar")
 
   echo '<link rel="stylesheet" type="text/css" href='{{asset("dashboard/app-assets/css-rtl/custom-rtl.css")}}'>'
    @endphp --}}

    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/style' . getFolder() . '.css') }}">

   <style>
        .tagify--outside {
            border: 0;
        }

        .tagify--outside .tagify__input {
            order: -1;
            flex: 100%;
            border: 1px solid var(--tags-border-color);
            margin-bottom: 1em;
            transition: .1s;
        }

        .tagify--outside .tagify__input:hover {
            border-color: var(--tags-hover-border-color);
        }

        .tagify--outside.tagify--focus .tagify__input {
            transition: 0s;
            border-color: var(--tags-focus-border-color);
        }
    </style>
    @stack('style')
    <!-- END Custom CSS-->

</head>

<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click"
    data-menu="vertical-menu-modern" data-col="2-columns">
    <!-- fixed-top-->


    <x-dashboard.includes.header />

    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN Side menu-->
    <x-dashboard.includes.side-menu />
    <!-- END Side menu-->


    <div class="app-content content">
        <div class="content-wrapper">

            {{ $breadcrumb ?? '' }}

            <div class="content-body">


                {{ $slot }}

            </div>
        </div>
    </div>



    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <!-- BEGIN Footer -->
    <x-dashboard.includes.footer />
    <!-- END Footer -->




    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('dashboard/app-assets/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{ asset('dashboard/app-assets/vendors/js/charts/chart.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('dashboard/app-assets/vendors/js/charts/raphael-min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('dashboard/app-assets/vendors/js/charts/morris.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('dashboard/app-assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('dashboard/app-assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('dashboard/app-assets/data/jvector/visitor-data.js') }}" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN MODERN JS-->
    <script src="{{ asset('dashboard/app-assets/js/core/app-menu.js') }}" type="text/javascript"></script>
    <script src="{{ asset('dashboard/app-assets/js/core/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('dashboard/app-assets/js/scripts/customizer.js') }}" type="text/javascript"></script>
    <!-- END MODERN JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{ asset('dashboard/app-assets/js/scripts/pages/dashboard-sales.js') }}" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />

    @stack('scripts')


    <!-- END PAGE LEVEL JS-->
</body>

</html>
