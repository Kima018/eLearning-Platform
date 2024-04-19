<?php

namespace App\Http\Controllers;

use App\Models\Lectures;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Intervention\Image\ImageManager;

class LecturesController extends Controller
{
    public function addNewLecture(): View
    {
        return view('admin.add-lecture');
    }

    public function allLectures(): View
    {
        $allLectures = Lectures::paginate(20);
        return view('admin.all-lectures', compact('allLectures'));
    }

    public function saveNewLecture(Request $request): RedirectResponse
    {

        $request->validate([
            'lecture_name' => 'required|string|max:100',
            'lecture_description' => 'required|string',
            'lecture_link' => 'required|string',
            'image' => 'file|max:2048|mimes:jpg,jpeg,png,webp',
        ]);

        $file = $request->file('image');
        $fileName = rand(0, 100) . time();
//        Storage::putFileAs('public/videoThumbnails/', $file, $fileName);
        $path = Storage::disk('public')->path('videoThumbnails')."/$fileName.webp";
        ImageManager::gd()->read($file)->save($path);

        Lectures::create([
            'name' => $request->get('lecture_name'),
            'description' => $request->get('lecture_description'),
            'lecture_link' => $request->get('lecture_link'),
            'thumbnail_image'=>$fileName.'.webp',
            'user_id' => Auth::id(),
        ]);

        return redirect()->back();
    }

    public function editLectures():View
    {
        $allLectures = Lectures::paginate(20);
        return view('admin.edit-lectures',compact('allLectures'));
    }

}


/*
 * Zasto u falidaciju mi ne pusta => 'image|'
 */
