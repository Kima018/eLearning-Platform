<!doctype html >
<html lang="en" data-bs-theme-mode="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>eLearning</title>
    <link rel="icon" href="{{asset('favicon.png')}}" type="image/png">
    @vite('resources/css/app.css')

</head>
<body>
@include('components.aside')
@yield('allLectures')

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>
