<!DOCTYPE html>
<html lang="en">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <link href="{{ asset('dist/images/logo.svg') }}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Apol has been delivering digital marketing solutions and can help with your digital strategy,improve user experience,business intelligence or help engage users.">
    <meta name="keywords" content="apol, apolbd, apol bd, apol bangladesh,apol digital marketing, apol crash course, best facebook marketing agency in dhaka bangladesh, facebook marketing agency, facebook advertising agency, google ads marketing, youtube marketing, messenger marketing">
    <meta name="author" content="Apol">
    <title>@yield('title') - {{ config('app.name', 'Apol Ecommerce Application') }}</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}" />
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->
<body class="app">
<!-- BEGIN: Mobile Menu -->
@include('backend.layouts._mobile_menu')
<!-- END: Mobile Menu -->
<div class="flex">
    <!-- BEGIN: Side Menu -->
    @include('backend.layouts._sidebar')
    <!-- END: Side Menu -->
    <!-- BEGIN: Content -->
    @yield('mainContent')
    <!-- END: Content -->
</div>
<!-- BEGIN: JS Assets-->
@include('backend.layouts._footer_script')
@yield('pageJs')
<!-- END: JS Assets-->
</body>
</html>
