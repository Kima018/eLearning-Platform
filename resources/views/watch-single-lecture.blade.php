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
    {{--    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />--}}
</head>
<body>
@include('components.aside')

<section class="px-5 sm:ml-64 sm:mt-10 text-gray-900">
    <div class="w-full h-[60vh]">
        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{$lecture->lecture_link}}"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>
    <div class="flex flex-col justify-between">
        <h1 class="text-4xl font-semibold">{{$lecture->name}}</h1>
        <p>{{$lecture->description}}</p>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>

