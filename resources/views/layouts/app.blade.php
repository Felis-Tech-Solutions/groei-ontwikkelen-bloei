<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-gob-bg">
@include('partials.nav')
<div class="container mx-auto">
@yield('content')
        @yield('aboutus')
    </div>
</body>
@include('partials.footer')
</html>
