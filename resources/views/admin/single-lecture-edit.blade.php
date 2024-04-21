@extends('admin.admin-layout')

@section('editLecture')
    <section class="px-5 sm:ml-64 sm:mt-10 text-gray-900">
        <div class="mx-auto flex justify-center mb-5">
            <h1 class="font-bold text-3xl underline underline-offset-4">EDIT LECTURE</h1>
        </div>
        <div>
            <ul>
                <li>* MUST HAVE *</li>
                <li>$ name of lecture</li>
                <li>$ description</li>
                <li>$ link</li>
            </ul>
        </div>

        <form class="max-w-sm mx-auto" method="POST" action="{{route('lecture.update')}}" enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="mb-5">
                <label for="lecture_name" class="block mb-2 text-sm font-medium">Name of Lecture</label>
                <input
                    name="lecture_name"
                    value="{{ $lecture->name }}"
                    type="text"
                    id="lecture_name"
                    class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-200 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Name" required/>
            </div>
            <div class="mb-5">
                <label for="description" class="block mb-2 text-sm font-medium">Description</label>
                <textarea
                    name="lecture_description"
                    id="description"
                    rows="4"
                    class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-200 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Description" required>{{ $lecture->description }}</textarea>

            </div>
            <div class="mb-5">
                <label for="video_link" class="block mb-2 text-sm font-medium">Video Link</label>
                <input
                    name="lecture_link"
                    value="{{ $lecture->lecture_link }}"
                    type="text"
                    id="video_link"
                    class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-200 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Enter Link" required/>
            </div>
            <div class="mb-5">
                <label for="image" class="block mb-2 text-sm font-medium">Current Thumbnail Image</label>
                <img class="rounded-t-lg w-24 h-24 object-cover object-center pb-2"
                     src="/storage/videoThumbnails/{{$lecture->thumbnail_image}}"
                     alt="thumbnail"/>
                <input
                    name="image"
                    type="file"
                    id="image"
                    class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-200 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                />
            </div>
            <input type="hidden"
                   name="lecture_id"
                   value="{{$lecture->id}}">
            <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Update Lecture
            </button>
        </form>


    </section>
@endsection
