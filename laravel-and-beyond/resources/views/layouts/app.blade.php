<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'E-Commerce Project')</title>
<!--Bootstrap
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">-->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!--Laravel Mix JS-->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ mix('js/owl.carousel.min.js') }}"></script>

    <script defer src="{{ mix('js/app.js') }}"></script>
    <!--Laravel Mix SASS-->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!--Tailwind-->
    <script src="https://cdn.tailwindcss.com"></script>

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!--Clockwork-->
    <script defer src="https://cdn.jsdelivr.net/gh/underground-works/clockwork-browser@1/dist/toolbar.js" ></script>
    <!-- Add these in the head section of your HTML -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>




</head>
<body class="light-mode">
<header>
    @include('partials.header')
</header>

<div class="container mx-auto mt-8">
    @yield('content')
</div>


<br><br>
<footer class="text-center mb-5 bg-purple-950 text-white p-6">
    @include('partials.footer')
</footer>

</body>
@php
    $currentMode = 'day'; // You need to set this based on your logic
@endphp
<style>
    header  {
        background-image: url('{{ asset("images/{$currentMode}-header.png") }}');
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        height: 100vh;
        margin: 0;
    }
</style>

</html>

