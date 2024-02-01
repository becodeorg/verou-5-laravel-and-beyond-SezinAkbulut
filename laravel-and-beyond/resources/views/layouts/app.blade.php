<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'E-Commerce Project')</title>
<!--Bootstrap
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">-->
<!--Clockwork-->
<script src="https://cdn.jsdelivr.net/gh/underground-works/clockwork-browser@1/dist/toolbar.js"></script>
<!--Laravel Mix JS-->
<script src="{{ mix('js/app.js') }}"></script>
<!--Laravel Mix SASS-->
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!--Tailwind-->
    <script src="https://cdn.tailwindcss.com"></script>
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

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
<style>

   header  {
       background-image: url('{{ asset("images/day-header.png") }}');
       background-size: cover;
       background-repeat: no-repeat;
       background-position: center;
       height: 100vh;
       margin: 0;
   }

</style>


</html>

