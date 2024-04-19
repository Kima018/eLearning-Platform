@extends('admin.admin-layout')

@section('editLectures')
    <section class="px-5 sm:ml-64 sm:mt-10">
        <h1>EDIT LECTURES</h1>

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
                            <a href="#"
                               class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 ">
                                <span>Edit Lecture</span>
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                     viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2"
                                          d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                </svg>
                            </a>
                            <a href="#"
                               class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800  dark:bg-red-600 dark:hover:bg-red-700 ">
                                <span>Delete</span>
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                     viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
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
