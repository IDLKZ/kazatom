<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <base href="/">
    <title>Eduport - LMS, Education and Course Theme</title>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700&family=Roboto:wght@400;500;700&display=swap">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/font-awesome/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/tiny-slider/tiny-slider.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/glightbox/css/glightbox.css')}}">

    <!-- Theme CSS -->
    <link id="style-switch" rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    @livewireStyles
    @stack('css')
</head>

<body>

@include('layouts.header')

@yield('content')

<!-- =======================
Footer START -->
@include('layouts.footer')
<!-- =======================
Footer END -->

<!-- Back to top -->
<div class="back-top"><i class="bi bi-arrow-up-short position-absolute top-50 start-50 translate-middle"></i></div>

<!-- Bootstrap JS -->
<script src="/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- Vendors -->
<script src="/assets/vendor/tiny-slider/tiny-slider.js"></script>
<script src="/assets/vendor/glightbox/js/glightbox.js"></script>
<script src="/assets/vendor/purecounterjs/dist/purecounter_vanilla.js"></script>

@livewireScripts
<script defer src="https://unpkg.com/alpinejs@3.9.0/dist/cdn.min.js"></script>
@stack('js')
<!-- Template Functions -->
<script src="/assets/js/functions.js"></script>
</body>
</html>
