@extends('layouts.user-layout')

@section('allLectures')
    <section class="px-5 sm:ml-64 sm:mt-10">
        <h1>ALL LECTURES</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @if($allLectures->count() > 0 )
                @foreach($allLectures as $lecture)
                    <div
                        class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="w-full max-h-52 overflow-hidden">
                            <img class="rounded-t-lg w-full h-full object-cover object-center"
                                 src="/storage/videoThumbnails/{{$lecture->thumbnail_image}}"
                                 alt="thumbnail"/>
                        </div>

                        <div class="p-5">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$lecture->name}}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$lecture->description}}</p>
                            <a href="{{route('lecture.watch',['lecture'=>$lecture->id])}}"
                               class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Start Lecture
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            @else
                <div>
                    <h2>No added lectures</h2>
                </div>
            @endif

        </div>

    </section>
@endsection
